# Funcionamiento de ejemplo
# 1- Borrar lo que hubiera: make clean
# 2- Compilar todo: make all
# 3- Crear los archivos .min.js de cada pagina: make modules

# ***************************************************
# *                                                 *
# *             Compresor yuicompressor             *
# *                                                 *
# ***************************************************
COMPRESSOR = /usr/local/bin/yuicompressor

# ***************************************************
# *													*
# *					Directorios						*
# *													*
# ***************************************************
JS_DIR = .
JS_DIR_MIN = ./min

# ***************************************************
# *                                                 *
# *         Archivos de Entrada y Salidas           *
# *                                                 *
# ***************************************************
SOURCES = $(shell ls *.js)
TARGETS = $(patsubst %.js,$(JS_DIR_MIN)/%.min.js,$(SOURCES))

BASE = $(JS_DIR_MIN)/menu2.min.js $(JS_DIR_MIN)/dropdown-menu.min.js $(JS_DIR_MIN)/seo_mailto.js

INDEX = $(BASE) $(JS_DIR_MIN)/slideshow.min.js $(JS_DIR_MIN)/enable_disable_google_maps.min.js
EMPRESA = $(BASE) $(JS_DIR_MIN)/classie.min.js $(JS_DIR_MIN)/modal.min.js

CLIENTES = $(BASE) $(JS_DIR_MIN)/classie.min.js $(JS_DIR_MIN)/modal.min.js $(JS_DIR_MIN)/modal_modeless.min.js \
$(JS_DIR_MIN)/inputs_styles.min.js

WORKSPACES = $(BASE) $(JS_DIR_MIN)/navigation_circles.min.js $(JS_DIR_MIN)/notab_nav_circles.min.js 
EVENTOS = $(BASE) $(JS_DIR_MIN)/classie.min.js $(JS_DIR_MIN)/inputs_styles.min.js

# ***************************************************
# *													*
# *						Shell						*
# *													*
# ***************************************************
SHELL = /bin/bash

# ***************************************************
# *													*
# *						Flags						*
# *													*
# ***************************************************
all: $(TARGETS)
	
# obtener los .min.css a raiz de los .css (compresion)
$(JS_DIR_MIN)/%.min.js: $(JS_DIR)/%.js
	@if [ -a $(JS_DIR_MIN)/$@ ] ; \
	then \
		rm $(JS_DIR_MIN)/$@ ; \
	fi;
	$(COMPRESSOR) --type js --charset UTF-8 --nomunge $< -o $@

# css para cada pagina en cuestion en un solo archivo .min.js
modules:
# Limpieza
	@echo Limpieza...
	@if [ -a $(JS_DIR)/index.min.js ] ; \
	then \
		rm $(JS_DIR)/index.min.js ; \
	fi;

	@if [ -a $(JS_DIR)/empresa.min.js ] ; \
	then \
		rm $(JS_DIR)/empresa.min.js ; \
	fi;

	@if [ -a $(JS_DIR)/clientes.min.js ] ; \
	then \
		rm $(JS_DIR)/clientes.min.js ; \
	fi;

	@if [ -a $(JS_DIR)/workspaces.min.js ] ; \
	then \
		rm $(JS_DIR)/workspaces.min.js ; \
	fi;

	@if [ -a $(JS_DIR)/eventos.min.js ] ; \
	then \
		rm $(JS_DIR)/eventos.min.js ; \
	fi;

# index
	@echo index.min.js...
	@for file in $(INDEX) ; do \
        cat $$file >> $(JS_DIR)/index.min.js; \
    done

# empresa
	@echo empresa.min.js...
	@for file in $(EMPRESA) ; do \
		cat $$file >> $(JS_DIR)/empresa.min.js; \
	done

# clientes
	@echo clientes.min.js...
	@for file in $(CLIENTES) ; do \
		cat $$file >> $(JS_DIR)/clientes.min.js; \
	done

# workspaces
	@echo workspaces.min.js...
	@for file in $(WORKSPACES) ; do \
		cat $$file >> $(JS_DIR)/workspaces.min.js; \
	done

# eventos
	@echo eventos.min.js...
	@for file in $(EVENTOS) ; do \
		cat $$file >> $(JS_DIR)/eventos.min.js; \
	done

clean:
	@echo Borrando $(JS_DIR_MIN)/*.min.js ...
	@rm $(JS_DIR_MIN)/*.min.js
	@echo Borrando $(JS_DIR)/*.min.js ...
	@rm $(JS_DIR)/*.min.js

# ***************************************************
# *													*
# *		Phony para llamar a los flags con make 		*
# *													*
# ***************************************************
.PHONY: all clean modules