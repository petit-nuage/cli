# -*- coding: utf-8 -*-
import os
import sys
from fabric import api, colors
from fabric.utils import puts as output
import fabric.contrib.files as ffiles

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


def exists(configuration, env, branch):
    # Init Fabric
    fabric_initer(configuration, env)

    # Params
    branch_slug = utils.slugify(branch)
    domain_path = utils.get_workspace_path(configuration, env, branch)

    #Load configuration
    if api.env.role == "local":
        return False

    else:
        return ffiles.exists(workspace_path + "/" + branch_slug)


def sync(configuration, env):
    fabric_initer(configuration, env)

    if api.env.role == "local":
        return False

    else:
        api.run("service nginx reload")
        return True


def install(configuration, env, workspace_path_link, filename):
    fabric_initer(configuration, env)

    if api.env.role == "local":
        return False

    else:
        with api.cd(workspace_path_link):
            if not ffiles.exists(filename):
                api.run("ln -s ../sites-available/%s" % filename)


def remove(configuration, env, branch):
    # Init Fabric
    fabric_initer(configuration, env)

    # Params
    branch_slug = utils.slugify(branch)
    domain_path = utils.get_domain_path(configuration, env)

    if api.env.role == "local":
        return False

    else:
        with api.cd(domain_path):
            domain_filename = utils.get_domain_filename(configuration, env, branch)
            domain_available = domain_path + "/sites-available/" + domain_filename
            domain_available_response = False
            if ffiles.exists(domain_available):
                api.run("rm %s" % domain_available)
                domain_available_response = True

            domain_enabled = domain_path + "/sites-enabled/" + domain_filename
            domain_enabled_response = False
            if ffiles.exists(domain_enabled):
                api.run("rm %s" % domain_enabled)
                domain_enabled_response = True

            return (domain_available_response and domain_enabled_response)
