#!/bin/bash

CSS_DIR="../css"

for file in $CSS_DIR/* ; do 
    if [ ! -d $file ]; then 
        file_info=`wc -c $file`; 
        delete=`echo $file_info|cut -f1 -d " "`;
        if [ $delete -eq 0 ]; then 
            echo "Borrando => $file";
            rm $file;
        fi
    fi
done