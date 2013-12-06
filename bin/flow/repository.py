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


def exists(configuration, env, branch="develop"):
    """
    Repository exists
    branch

    Test repository existence
    """

    # Init Fabric
    fabric_initer(configuration, env)

    # Params
    branch_slug = utils.slugify(branch)
    workspace_path = utils.get_workspace_path(configuration, env, branch)

    if api.env.role == "local":
        return False

    else:
        if not workspace_path:
            return False
        else:
            return ffiles.exists(workspace_path + "/.git")


def synchronize(configuration, env, branch="develop"):
    """
    Synchronize

    Synchronize repository
        - configuration
        - env
        - branch (develop)
    """

    # Go to correct branch
    checkout(branch)

    # Push commits
    push(branch)

    # Pull commits
    if workspace.exists(configuration, env, branch) and exists(configuration, env, branch):
        pull(configuration, env, branch)
        return True

    else:
        output("unable to pull %s" % branch)
        return False


def pull(configuration, env, branch="develop"):

    #
    fabric_initer(configuration, env)

    #
    branch_slug = utils.slugify(branch)
    workspace_path = utils.get_workspace_path(configuration, env, branch)

    if api.env.role == "local":
        api.local("git pull origin %s" % branch)
        return True

    else:
        with api.cd(workspace_path):
            api.run("git pull origin %s" % branch)
            return True


def checkout(branch="develop"):
    api.local("git checkout %s" % branch)
    return True


def push(branch="develop"):

    api.local("git push origin %s" % branch)
    return True


def clone(configuration, env, branch):

    #
    fabric_initer(configuration, env)

    #
    branch_slug = utils.slugify(branch)
    workspace_path = utils.get_workspace_path(configuration, env, branch)

    if api.env.role == "local":
        api.local("git clone %s ." % configuration["project"]["repository"])
        return True

    else:
        with api.cd(workspace_path):
            api.run("git clone %s ." % configuration["project"]["repository"])
            return True
