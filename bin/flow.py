from optparse import OptionParser
import glob
import os
from bin import workspace


def main():
    parser = OptionParser()

    parser.add_option("-s", "--stack",
                      dest="stack",
                      help="stack type")
    parser.add_option("-c", "--container",
                      dest="container",
                      help="container Dockerfile")
    parser.add_option("-b", "--branch",
                      dest="branch",
                      help="branch to deploy")
    parser.add_option("-t", "--target",
                      dest="target",
                      type="choice",
                      choices=["develop", "preprod"],
                      help="target to deploy")

    (options, args) = parser.parse_args()


if __name__ == "__main__":
    #main()
    workspace.create()
