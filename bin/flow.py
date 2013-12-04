#!/usr/bin/env python
# -*- coding: utf-8 -*-

import argparse
import sys

#from git import *
#from fabric.colors import red, green, blue, white
from fabric import utils
from fabric.colors import *

import flow
import config

import pprint


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


def stage(configuration, branch="develop"):
    """
    Create or synchronise stage environment on branch
    """

    # Check workspace existence
    if not flow.workspace.exists(configuration, "stage", branch):
        utils.puts(yellow("workspace for %s does not exist" % branch))
        utils.puts("create workspace for %s" % branch)

        # Create workspace
        if not flow.workspace.create(configuration, "stage", branch):
            utils.puts(red("unable to create workspace for %s" % branch))
            return False

        utils.puts(green("workspace for %s branch created" % branch))

        if not flow.repository.clone(configuration, "stage", branch):
            utils.puts(red("unable to clone %s for %s" % (configuration["project"]["repository"], branch)))
            return False

        utils.puts(green("workspace for %s branch created" % branch))

        # Bake configuration
        if not flow.baker.cook(configuration, "stage", branch):
            utils.puts(red("can not install configuration for %s" % branch))
            return False

        utils.puts(green("configuration installed for %s created" % branch))

    utils.puts("synchronize repository for %s" % branch)

    if flow.repository.synchronize(configuration, "stage", branch):
        utils.puts(green("%s synchronized" % branch))
        return False

    else:
        utils.puts(red("can not synchronize %s" % branch))
        return True


def unstage(configuration, branch="develop"):
    """
    Remove stage environment on branch
    """

    # Check workspace existence
    if not flow.workspace.exists(configuration, "stage", branch):
        utils.puts(yellow("workspace for %s does not exist" % branch))
        return False

    # Remove workspace
    if not flow.workspace.delete(configuration, "stage", branch):
        utils.puts(red("unable to remove workspace for %s" % branch))
        return False

    utils.puts(green("workspace for %s branch removed" % branch))
    return True


def main():
    parser = argparse.ArgumentParser()

    parser.usage = "flow <command> [<branch>]\n\n\
The most commonly command used flow commands are:\n\
    build   Build package based on branch\n\
    deploy  Deploy master branch to production\n\
    test    Test a branch\n\
    stage   Create or synchronise stage environment for branch\
    unstage   Remove stage environment for branch"

    parser.add_argument("command",
                        choices=config.commands,
                        help="command to execute")

    parser.add_argument("branch",
                        help="branch to use")

    parser.add_argument("--config",
                        default="flow.json",
                        help="json file to use as configuration")

    parser.add_argument("--recipes",
                        help="recipes path")

    args = parser.parse_args()

    # Options
    if args.config:
        with open(args.config) as file_resource:
            configuration = flow.utils.configure(file_resource)

    else:
        print red("flow.json is missing")
        sys.exit(1)

    # check command
    if args.command not in config.commands:
        print parser.usage
        sys.exit(1)

    # Run task
    if args.command == "build":
        return build(configuration, args.branch)

    elif args.command == "deploy":
        return deploy(configuration)

    elif args.command == "stage":
        return stage(configuration, args.branch)

    elif args.command == "test":
        return test(configuration, args.branch)

    elif args.command == "unstage":
        return unstage(configuration, args.branch)


# Run main function
if __name__ == "__main__":
    main()
