#!/bin/bash

# Get all jobs
for R in $(seq 1 $(shyaml get-length 'jobs.test.steps' <.circleci/config.yml)); do
    JOB="$(shyaml --quiet get-value "jobs.test.steps.$((R - 1)).run" <.circleci/config.yml)"
    test "$?" -eq 0 || continue
    echo "$JOB"
#      Execute job
done | xargs -I "%" bash -x -c "%"
