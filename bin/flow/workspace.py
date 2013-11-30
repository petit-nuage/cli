import os
import sys
from fabric import api, utils


#print dir(fabric)

# Environment information
api.env.use_ssh_config = True
api.env.roledefs = {
    'local': ['localhost'],
    'test': ['jenkins.app.darkelda.com'],
    'stage': ['www-data@dev.darkelda.com'],
    'master': ['www-data@back.w-s.re']
}

# App information
REMOTE_URL = "git@bitbucket.org:nicolas_ramy/ws-backend.git"

WORKSPACE_DIR = "/var/www/ws-back"
DOMAIN_AVAILABLE_DIR = "/etc/nginx/sites-available"
DOMAIN_ENABLED_DIR = "/etc/nginx/sites-enabled"

HOST_STAGE = "dev.darkelda.com"
HOST_MASTER = "back.w-s.re"


def workspace_exists(workspace_path):
    """
    Workspace exists
    branch

    dist
    Test workspace existance
    """
    if len(api.env.roles) == 0 or "local" in api.env.roles:
        nothing_to_do()
        return False

    else:
        if not workspace_path:
            return False
        else:
            return contrib.files.exists(workspace_path)


def create(branch="develop"):
    """
    Workspace create
    workspace

    dist
    Test and create workspace
    """

    if len(api.env.roles) == 0 or "local" in api.env.roles:
        utils.puts("Nothing to do here...")
        return False

    else:
        branch_slug = branch.replace("/", "_")
        workspace_path = WORKSPACE_DIR + "/" + branch_slug

        if workspace_exists(workspace_path):
            utils.puts("%s exists" % workspace_path)
            return False

        else:
            with api.cd(WORKSPACE_DIR):
                return api.run("mkdir %s" % branch_slug)


def workspace_delete(branch="develop"):
    """
    Workspace delete
    workspace

    dist
    Test and delete workspace
    """
    if len(api.env.roles) == 0 or "local" in api.env.roles:
        print "Nothing to do here..."
        return False

    else:
        branch_slug = branch.replace("/", "_")
        workspace_path = WORKSPACE_DIR + "/" + branch_slug

        if not workspace_exists(workspace_path):
            utils.puts("%s doesn't exist" % workspace_path)
            return False

        else:
            with api.cd(WORKSPACE_DIR):
                return api.run("rm -Rf %s" % branch_slug)


def workspace_synchronize(branch="develop"):
    """
        Workspace synchronize
        workspace

        dist
        Synchronize workspace
    """
    if len(api.env.roles) == 0 or "local" in api.env.roles:
        return git_pull(branch)

    else:
        branch_slug = branch.replace("/", "_")
        workspace_path = WORKSPACE_DIR + "/" + branch_slug

        if not workspace_exists(workspace_path):
            utils.puts("%s doesn't exist" % workspace_path)
            return False

        else:
            return git_pull(branch, workspace_path)
