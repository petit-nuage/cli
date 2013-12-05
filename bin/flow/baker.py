#!/usr/bin/env python
# -*- coding: utf-8 -*-

import os
import sys
from fabric import api, colors
from fabric.utils import puts as output
import fabric.contrib.files as ffiles
import workspace
import pystache

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

    if configuration[env]["app"]["type"] in apps:
        if configuration[env]["app"]["type"] == "angularjs":
            return True

        elif configuration[env]["app"]["type"] == "cakephp":

            web = {
                "domain": utils.slugify(configuration["project"]["name"]) + "." +
                utils.slugify(branch, "--") + "." + configuration[env]["host"]
            }

            with open(recipes + "/app/cakephp/database.php") as fileout_resource:
                fileout = pystache.render(fileout_resource.read(), web)
                pprint.pprint(fileout_resource.read())
                pprint.pprint(web)

            add_file(configuration, env, branch, fileout)

            # Mustache recipes
            print "pystache"
            return True

        elif app_config["type"] == "flask":
            return True

        else:
            return False

    return False


def add_file(configuration, env, branch, fileout):
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
    branch_slug = utils.slugify(branch)
    workspace_path = utils.get_workspace_path(configuration, env, branch)

    pprint.pprint(fileout)

    return False
