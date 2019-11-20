#!/bin/bash

# Get all jobs but the first
for R in $(seq 2 $(shyaml get-length 'jobs.test.steps' <.circleci/config.yml)); do
    shyaml get-value "jobs.test.steps.$((R - 1)).run" <.circleci/config.yml
    echo
#      Execute job
done | xargs -I "%" bash -x -c "%"
