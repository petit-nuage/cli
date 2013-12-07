# -*- coding: utf-8 -*-
from fabric import utils as f_utils
from fabric import colors as f_colors

import baker
import domain
import repository
import test
import utils
import workspace


commands = ["build", "deploy", "stage", "test", "unstage"]


def build(branch):
    """
    Build package based on branch
    """
    pass


def deploy():
    """
    Deploy master branch to production environment
    """
    pass


def test(branch):
    """
    Test branch
    """
    pass


def stage(configuration, recipes, branch="develop"):
    """
    Create or synchronise stage environment on branch
    """

    # Check workspace existence
    if not workspace.exists(configuration, "stage", branch):
        f_utils.puts(f_colors.green("create workspace for %s" % branch))

        # Create workspace
        if not workspace.create(configuration, "stage", branch):
            f_utils.puts(f_colors.red("unable to create workspace for %s" % branch))
            return unstage(configuration, branch)
        f_utils.puts(f_colors.green("workspace for %s branch created" % branch))

        # Clone repository
        if not repository.clone(configuration, "stage", branch):
            f_utils.puts(f_colors.red("unable to clone %s for %s" % (configuration["project"]["repository"], branch)))
            return unstage(configuration, branch)
        f_utils.puts(f_colors.green("workspace for %s branch created" % branch))

        # Install domain

        # Run recipe
        if not baker.bake(configuration, recipes, "stage", branch):
            f_utils.puts(f_colors.red("can not install configuration for %s" % branch))
            return unstage(configuration, branch)
        f_utils.puts(f_colors.green("configuration installed for %s created" % branch))

        return True

    else:
        f_utils.puts("synchronize repository for %s" % branch)

        if repository.synchronize(configuration, "stage", branch):
            f_utils.puts(f_colors.green("%s synchronized" % branch))
            return True
        else:
            f_utils.puts(f_colors.red("can not synchronize %s" % branch))
            return False


def unstage(configuration, branch="develop"):
    """
    Remove stage environment on branch
    """

    # Check workspace existence
    if workspace.delete(configuration, "stage", branch):
        f_utils.puts(f_colors.green("workspace for %s branch removed" % branch))

    # Remove domain
    if domain.remove(configuration, "stage", branch):
        f_utils.puts(f_colors.green("domain for %s branch removed" % branch))

    return True
