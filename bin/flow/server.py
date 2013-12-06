# -*- coding: utf-8 -*-
import os
import sys
from fabric import api, colors
from fabric.utils import puts as output
import fabric.contrib.files as ffiles
import workspace

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


def nginx_reload_service(configuration, env):
    fabric_initer(configuration, env)

    if api.env.role == "local":
        return False

    else:
        api.run("service nginx reload")
        return True


def nginx_link_domain(configuration, env, workspace_path_link, filename):
    fabric_initer(configuration, env)

    if api.env.role == "local":
        return False

    else:
        with api.cd(workspace_path_link):
            if not ffiles.exists(filename):
                api.run("ln -s ../sites-available/%s" % filename)


