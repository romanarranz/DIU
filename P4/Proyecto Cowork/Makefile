# Ejemplo de uso 
# 1- Borramos lo que hubiera antes: make clean
# 2- Comprimimos los .php: make all

# ***************************************************
# *                                                 *
# *             Compressor yuicompressor            *
# *                                                 *
# ***************************************************
COMPRESSOR = /usr/local/bin/html-minifier

# ***************************************************
# *                                                 *
# *                 Directorios                     *
# *                                                 *
# ***************************************************
HTML_DIR = ./source
HTML_DIR_MIN = ./src

# ***************************************************
# *                                                 *
# *         Archivos de Entrada y Salidas           *
# *                                                 *
# ***************************************************
SOURCES = $(shell ls $(HTML_DIR)/*.php)
TARGETS = $(patsubst $(HTML_DIR)/%.php,$(HTML_DIR_MIN)/%.php,$(SOURCES))
INDEX = $(HTML_DIR)/index.php

# ***************************************************
# *                                                 *
# *                     Shell                       *
# *                                                 *
# ***************************************************
SHELL = /bin/bash

# ***************************************************
# *                                                 *
# *                     Flags                       *
# *                                                 *
# ***************************************************
all: $(TARGETS) index.php

# obtener los .html de src a raiz de los .html de source (compresion)
$(HTML_DIR_MIN)/%.php: $(HTML_DIR)/%.php
	$(COMPRESSOR) --remove-comments --collapse-whitespace $< -o $@

# obtener la version comprimida de la index y moverla a la raiz
index.php: $(INDEX)
	@mv $(HTML_DIR_MIN)/index.php ./index.php

clean:
	@echo Borrando index
	@if [ -a ./index.php ] ; \
	then \
		rm ./index.php ; \
	fi;

	@echo Borrando $(HTML_DIR_MIN) ...
	@rm $(HTML_DIR_MIN)/*
	
# ***************************************************
# *                                                 *
# *     Phony para llamar a los flags con make      *
# *                                                 *
# ***************************************************
.PHONY: all clean