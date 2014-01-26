# -*- coding: utf-8 -*-


import json
import re

domain_nginx = ["nginx", "nginx_cakephp"]


def slugify(word, glue="_"):
    """
    Slugify string
    """

    return word.replace("/", glue)


def configure(file_resource):
    # Regular expression for comments
    comment_re = re.compile('(^)?[^\S\n]*/(?:\*(.*?)\*/[^\S\n]*|/[^\n]*)($)?', re.DOTALL | re.MULTILINE)

    content = ''.join(file_resource.readlines())

    ## Looking for comments
    match = comment_re.search(content)

    while match:
        # single line comment
        content = content[:match.start()] + content[match.end():]
        match = comment_re.search(content)

        # Return json file

    return json.loads(content)


def get_workspace_path(configuration, env, branch=False):
    if not branch:
        return configuration[env]["workspace"] + "/" + configuration["Project"]["name"]

    else:
        return configuration[env]["workspace"] + "/" + configuration["project"]["name"] + "/" + slugify(branch)


def get_domain_path(configuration, env):
    if configuration[env]["app"]["web"] in domain_nginx:
        return "/etc/nginx"

    else:
        return False


def get_domain_filename(configuration, env, branch=False):
    if not branch:
        return configuration["project"]["name"] + "." + configuration[env]["host"]

    else:
        return configuration["project"]["name"] + "." + slugify(branch, "--") + "." + configuration[env]["host"]


def get_recipe_filename(configuration, env, branch=False):
    if not branch:
        return configuration["project"]["name"] + "." + configuration[env]["host"]

    else:
        return configuration["project"]["name"] + "." + slugify(branch) + "." + configuration[env]["host"]
