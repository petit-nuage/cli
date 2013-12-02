import json
from optparse import OptionParser
import os
import re
import sys

from git import *
#from fabric.colors import red, green, blue, white
from fabric.colors import *

import flow

import pprint

# Parse a JSON file with comments
# http://www.lifl.fr/~riquetd/parse-a-json-file-with-comments.html

# Regular expression for comments
comment_re = re.compile('(^)?[^\S\n]*/(?:\*(.*?)\*/[^\S\n]*|/[^\n]*)($)?', re.DOTALL | re.MULTILINE)


def parse_json(filename):
    """ Parse a JSON file
        First remove comments and then use the json module package
        Comments look like :
            // ...
        or
            /*
            ...
            */
    """
    with open(filename) as file_resource:
        content = ''.join(file_resource.readlines())

        ## Looking for comments
        match = comment_re.search(content)
        while match:
            # single line comment
            content = content[:match.start()] + content[match.end():]
            match = comment_re.search(content)

        pprint.pprint(json.loads(content))

        # Return json file
        return json.loads(content)


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


def stage(branch):
    """
    Create or synchronise stage environment on branch
    """

    # Check workspace existance
    if not flow.workspace.exists("stage", branch):
        print yellow("stage: workspace for %s branch does not exist" % branch)
        print blue("stage: create workspace for %s branch" % branch)

        # Create workspace
        if not flow.workspace.create("stage", branch):
            print red("stage: unable to create workspace for %s branch" % branch)
            return False

        print green("stage: workspace for %s branch created" % branch)

        # Bake configuration
        if not flow.baker.configure():
            print red("stage: can not install configuration for %s branch" % branch)
            return False

        print green("stage: configuration installed for %s branch created" % branch)

    if flow.repository.synchronise("stage", branch):
        print green("stage: %s branch synchronised" % branch)
    else:
        print red("stage: can not synchronise %s branch" % branch)

    pass


def main():
    parser = OptionParser()

    parser.usage = "flow <command> [<branch>]\n\n\
The most commonly command used flow commands are:\n\
    build   Build package based on branch\n\
    deploy  Deploy master branch to production\n\
    test    Test a branch\n\
    stage   Create or synchronise stage environment on branch"

    #parser.add_option("-w", "--workspace",
    #                  dest="workspace",
    #                  help="branch to deploy")

    parser.add_option("-c", "--configuration-file",
                      dest="filename",
                      default="flow.json",
                      help="configuration file")

    (options, args) = parser.parse_args()

    # Options
    if options.filename:
        config = parse_json(options.filename)
    else:
        print red("flow.json is missing")
        sys.exit(1)

    # Check args passed
    if not len(args) or len(args) != 2:
        print parser.usage
        sys.exit(1)

    # retrieve command and branch
    command = args[0]
    branch = args[1]

    # check command
    if command not in ["build", "deploy", "stage", "test"]:
        print parser.usage
        sys.exit(1)

    # Run task
    if command == "build":
        return build(branch)
    elif command == "deploy":
        return deploy()
    elif command == "test":
        return test(branch)
    elif command == "stage":
        return stage(branch)


# Run main function
if __name__ == "__main__":
    main()
