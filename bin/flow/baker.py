# -*- coding: utf-8 -*-

import os
import sys
from fabric import api, colors
from fabric.utils import puts as output
import fabric.contrib.files as ffiles
import pystache

import workspace
import server

import utils

import pprint

# Environment information
api.env.use_ssh_config = True


def fabric_initer(configuration, env):
    """
    Fabric Initer

    Set Fabric api env vars
        - configuration
        - env
    """

    api.env.role = env
    api.env.roledefs = configuration["roles"]
    api.env.hosts = str(configuration["roles"][env])
    api.env.host_string = str(configuration["roles"][env])

    return api


def bake(configuration, recipes, env, branch="develop"):
    """
    Bake
    branch

    Bake
    """

    # Init Fabric
    fabric_initer(configuration, env)

    # Params
    branch_slug = utils.slugify(branch)
    workspace_path = utils.get_workspace_path(configuration, env, branch)

    if install(configuration, recipes, env, branch):
        return True

    return False


def install(configuration, recipes, env, branch):
    apps = ["cakephp", "angularjs", "flask"]
    branch_slug = utils.slugify(branch)
    domain_slug = configuration["project"]["name"] + "." + branch_slug + "." + configuration[env]["host"]

    if configuration[env]["app"]["type"] in apps:
        if configuration[env]["app"]["type"] == "angularjs":
            return True

        elif configuration[env]["app"]["type"] == "cakephp":

            web = {
                "domain": utils.slugify(configuration["project"]["name"]) + "." +
                utils.slugify(branch, "--") + "." + configuration[env]["host"],
                "root_path": configuration[env]["workspace"] + "/" + configuration["project"]["name"] + "/" + branch
            }
            pprint.pprint(web)

            # Create nginx_fpm configuration
            if configuration[env]["app"]["web"] == "nginx_cakephp":
                with open(recipes + "/web/nginx_cakephp/domain.conf") as fileout_resource:
                    fileout = pystache.render(fileout_resource.read(), web)

                    # Write nginx configuration
                    workspace_path = "/etc/nginx/sites-available"
                    filename = workspace_path + "/" + domain_slug
                    add_file(configuration, env, branch, workspace_path, filename, fileout)

                    # Symbolic link
                    filename = domain_slug
                    workspace_path_link = "/etc/nginx/sites-enabled"
                    link_domain(configuration, env, workspace_path_link, filename)

                    # Symbolic link
                    server.nginx_reload_service(configuration, env + "_root")

            databases = configuration[env]["app"]["databases"]
            # Create cakephp database
            with open(recipes + "/app/cakephp/database.php") as fileout_resource:
                pprint.pprint(databases)
                fileout = pystache.render(fileout_resource.read(), databases)

                workspace_path = configuration[env]["workspace"] + "/" + configuration["project"]["name"] + \
                    "/" + utils.slugify(branch) + "/app/Config"
                filename = workspace_path + "/database.php"
                if add_file(configuration, env, branch, workspace_path, filename, fileout):
                    print "ok"
                else:
                    print "fail"

            # Mustache recipes
            print "pystache"
            return True

        elif app_config["type"] == "flask":
            return True

        else:
            return False

    return False


def add_file(configuration, env, branch, workspace_path, filename, fileout):
    """
    Add file
    configuration
    env
    branch
    fileout

    Bake
    """

    # Init Fabric
    fabric_initer(configuration, env)

    # Params

    # filename exists?
    if api.env.role == "local":
        return False

    else:
        if not workspace_path:
            return False

        else:
            # Write file
            print "write file"
            ffiles.append(filename, fileout)


def link_domain(configuration, env, workspace_path_link, filename):
    fabric_initer(configuration, env)

    if api.env.role == "local":
        return False

    else:
        with api.cd(workspace_path_link):
            if not ffiles.exists(filename):
                api.run("ln -s ../sites-available/%s" % filename)
