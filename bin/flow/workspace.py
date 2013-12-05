#!/usr/bin/env python
# -*- coding: utf-8 -*-

import os
import sys
from fabric import api, colors, utils
import fabric.contrib.files as ffiles

import pprint

# Environment information
api.env.use_ssh_config = True


def get_workspace_path(configuration, env):
    return str(configuration[env]["workspace"] + "/" + configuration["project"]["name"])


def get_branch_slug(branch):
    return branch.replace("/", "_")


def load_configuration(configuration, env):
    api.env.role = env
    api.env.roledefs = configuration["roles"]
    api.env.hosts = str(configuration["roles"][env])
    api.env.host_string = str(configuration["roles"][env])
    return api


def exists(configuration, env, branch="develop"):
    """
    Workspace exists
    branch

    dist
    Test workspace existence
    """

    #Load configuration
    api = load_configuration(configuration, env)
    branch_slug = get_branch_slug(branch)
    workspace_path = get_workspace_path(configuration, env)

    if api.env.role == "local":
        return False

    else:
        if not workspace_path:
            return False
        else:
            return ffiles.exists(workspace_path + "/" + branch_slug)


def create(configuration, env, branch="develop"):
    """
    Workspace create
    workspace

    dist
    Test and create workspace
    """

    #Load configuration
    api = load_configuration(configuration, env)
    branch_slug = get_branch_slug(branch)
    workspace_path = get_workspace_path(configuration, env)

    if api.env.role == "local":
        utils.puts("Nothing to do here...")
        return False

    else:
        if exists(configuration, env, branch):
            utils.puts("%s exists" % branch)
            return False

        else:
            with api.cd(workspace_path):
                api.run("mkdir %s" % branch_slug)
                return True


def delete(configuration, env, branch="develop"):
    """
    Workspace delete
    workspace

    dist
    Test and delete workspace
    """

    #Load configuration
    api = load_configuration(configuration, env)
    branch_slug = get_branch_slug(branch)
    workspace_path = get_workspace_path(configuration, env)

    if api.env.role == "local":
        utils.puts(green("Nothing to do here..."))
        return False

    else:

        if exists(configuration, env, branch):
            utils.puts(colors.green("workspace for %s exists" % branch))

            with api.cd(workspace_path):
                api.run("rm -Rf %s" % branch_slug)
                return True

        else:
            return False


def synchronize(configuration, env, branch="develop"):
    """
        Workspace synchronize
        workspace

        dist
        Synchronize workspace
    """
    pass
