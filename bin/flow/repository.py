import os
import sys
from fabric import api, colors, utils
import fabric.contrib.files as ffiles
import workspace

import pprint

# Environment information
api.env.use_ssh_config = True


def get_workspace_path(configuration, env):
    return str(configuration[env]["workspace"] + "/" + configuration["project"]["name"])


def get_workspace_branch_path(configuration, env, branch_slug):
    return str(configuration[env]["workspace"] + "/" + configuration["project"]["name"] + "/" + branch_slug)


def get_branch_slug(branch):
    return branch.replace("/", "_")


def load_configuration(configuration, env):
    api.env.role = env
    api.env.roledefs = configuration["roles"]
    api.env.hosts = str(configuration[env]["host"])
    api.env.host_string = str(configuration[env]["host"])
    return api


def synchronize(configuration, env, branch="develop"):
    push(branch)

    if workspace.exists(configuration, env, branch):
        pull(configuration, env, branch)
        return True

    else:
        utils.puts("unable to pull %s" % branch)
        return False


def pull(configuration, env, branch="develop"):
    api = load_configuration(configuration, env)
    branch_slug = get_branch_slug(branch)
    workspace_path = get_workspace_path(configuration, env) + "/" + branch_slug

    if api.env.role == "local":
        api.local("git pull origin %s" % branch)
        return True

    else:
        with api.cd(workspace_path):
            api.run("git pull origin %s" % branch)
            return True


def push(branch="develop"):
    api.local("git push origin %s" % branch)
    return True


def clone(configuration, env, branch="develop"):
    pass
