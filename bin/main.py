# -*- coding: utf-8 -*-

import argparse
import sys

import flow


commands = ["stage", "unstage"]


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
                        choices=commands,
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
    if args.command not in commands:
        print parser.usage
        sys.exit(1)

    # Run task
    if args.command == "build":
        return flow.build(configuration, args.recipes, args.branch)

    elif args.command == "deploy":
        return flow.deploy(configuration, args.recipes)

    elif args.command == "stage":
        return flow.stage(configuration, args.recipes, args.branch)

    elif args.command == "test":
        return flow.test(configuration, args.recipes, args.branch)

    elif args.command == "unstage":
        return flow.unstage(configuration, args.branch)


# Run main function
if __name__ == "__main__":
    main()
