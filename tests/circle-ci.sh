#!/bin/bash
#
# Run all CircleCI jobs.
#
# DEPENDS       :pip install shyaml

# Get all jobs
for R in $(seq 1 $(shyaml get-length 'jobs.test.steps' <.circleci/config.yml)); do
    JOB="$(shyaml --quiet get-value "jobs.test.steps.$((R - 1)).run" <.circleci/config.yml)"
    # Skip non-run jobs
    test "$?" -eq 0 || continue
    echo "$JOB"
#      Execute jobs
done | xargs -I "%" bash -x -c "%"
