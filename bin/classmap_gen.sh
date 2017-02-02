#!/usr/bin/env bash

#/bin/sh

DIR="$( cd "$( dirname "$0" )" && pwd )"

projectDir=`dirname $DIR`
dirsModule=`ls -d $projectDir/module/*`

for dir in $dirsModule
do
    folder=`basename $dir`
    if [ "$folder" == "RenderElement" ]; then
        dirsRenders=`ls -d $dir/*`

        for dr in $dirsRenders
        do
            cd "$dr/"
            echo `pwd`
            sh -c "$projectDir/vendor/bin/classmap_generator.php"
        done
    else
        cd "$dir"
        echo `pwd`
        sh -c "$projectDir/vendor/bin/classmap_generator.php"
    fi
done;

exit