#!/usr/bin/env python
# -*- coding: utf-8 -*-

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


def clean_json_object(json_object):
    data = {}
    for row in json_object:
        data[str(row)] = str(json_object[row])

    return data


def get_app(configuration, env):
    app = {}
    app["type"] = str(configuration[env]["app"]["type"])
    app["web"] = str(configuration[env]["app"]["web"])

    app["databases"] = {}
    for db in configuration[env]["app"]["databases"]:
        db_key = str(db)
        app["databases"][db_key] = clean_json_object(configuration[env]["app"]["databases"][db_key])

    return app


def load_configuration(configuration, env):
    api.env.role = env
    api.env.roledefs = configuration["roles"]
    api.env.hosts = str(configuration[env]["host"])
    api.env.host_string = str(configuration[env]["host"])
    return api


def cook(configuration, env, branch="develop"):
    api = load_configuration(configuration, env)
    branch_slug = get_branch_slug(branch)
    workspace_path = get_workspace_path(configuration, env)

    app_config = get_app(configuration, env)

    if install(app_config):
        return True

    return False


def install(app_config):
    apps = ["cakephp", "angularjs", "flask"]

    if app_config["type"] in apps:
        if app_config["type"] == "angularjs":
            return True

        elif app_config["type"] == "cakephp":
            # Mustache recipes
            print "pystache"
            return True

        elif app_config["type"] == "flask":
            return True

        else:
            return False


    return False
