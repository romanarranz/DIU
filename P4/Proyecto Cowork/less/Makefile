# Ejemplo de uso 
# 1- Borramos lo que hubiera antes: make clean
# 2- Compilamos los .less para obtener los .css: make all
# 3- Comprimimos los .css para obtener los .min.css: make min
# 4- Obtenemos los modulos juntando sus partes: make modules

# ***************************************************
# *													*
# *	Compilador de less y compressor yuicompressor	*
# *													*
# ***************************************************
LESSC = /usr/local/bin/lessc
COMPRESSOR = /usr/local/bin/yuicompressor

# ***************************************************
# *													*
# *					Directorios						*
# *													*
# ***************************************************
CSS_DIR = ../css
CSS_DIR_MIN = ../css/min
LESS_DEPENDENCIES_DIR = dependencies

# ***************************************************
# *													*
# *			Archivos de Entrada y Salidas			*
# *													*
# ***************************************************
SOURCES = $(shell ls *.less)
TARGETS = $(patsubst %.less,$(CSS_DIR)/%.css,$(SOURCES))
TARGETS_MIN = $(patsubst %.less,$(CSS_DIR_MIN)/%.min.css,$(SOURCES))

# para modulos
BASE = $(CSS_DIR_MIN)/reset.min.css $(CSS_DIR_MIN)/core.min.css $(CSS_DIR_MIN)/font-styles.min.css \
$(CSS_DIR_MIN)/font-color.min.css $(CSS_DIR_MIN)/menu2.min.css $(CSS_DIR_MIN)/box.min.css \
$(CSS_DIR_MIN)/social_bar.min.css ../lib/icomoon/icomoon2.min.css

INDEX = $(BASE) $(CSS_DIR_MIN)/index.min.css $(CSS_DIR_MIN)/arrow_nav.min.css $(CSS_DIR_MIN)/navigation_circles.min.css \
$(CSS_DIR_MIN)/slideshow.min.css $(CSS_DIR_MIN)/button_styles.min.css

EMPRESAS = $(BASE) $(CSS_DIR_MIN)/empresas.min.css $(CSS_DIR_MIN)/img-effects.min.css $(CSS_DIR_MIN)/modal.min.css \
$(CSS_DIR_MIN)/input_styles.min.css

CLIENTES = $(BASE) $(CSS_DIR_MIN)/clientes.min.css $(CSS_DIR_MIN)/input_styles.min.css $(CSS_DIR_MIN)/button_styles.min.css \
$(CSS_DIR_MIN)/modal.min.css $(CSS_DIR_MIN)/checkbox.min.css

WORKSPACES = $(BASE) $(CSS_DIR_MIN)/workspaces.min.css $(CSS_DIR_MIN)/navigation_circles.min.css $(CSS_DIR_MIN)/slideshow2.min.css \
$(CSS_DIR_MIN)/arrow_nav.min.css

EVENTOS = $(BASE) $(CSS_DIR_MIN)/eventos.min.css $(CSS_DIR_MIN)/input_styles.min.css

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
min: $(TARGETS_MIN)

# obtener los .css compilando los .less
$(CSS_DIR)/%.css: %.less
	$(LESSC) -M $< $@ > $(LESS_DEPENDENCIES_DIR)/$*.d
	$(LESSC) $< > $@

# obtener los .min.css a raiz de los .css (compresion)
$(CSS_DIR_MIN)/%.min.css: $(CSS_DIR)/%.css
	$(COMPRESSOR) --type css --charset UTF-8 $< -o $@

# guardar las dependencias en la carpeta como archivos .d
-include $(TARGETS:.css=.d)

# unir todos los css en un script.css
merge:
	@cat $(CSS_DIR_MIN)/*.css >> $(CSS_DIR_MIN)/style.css

# css para cada pagina en cuestion en un solo archivo .css
modules:
# Limpieza
	@echo Limpieza...
	@if [ -a $(CSS_DIR)/index.min.css ] ; \
	then \
		rm $(CSS_DIR)/index.min.css ; \
	fi;

	@if [ -a $(CSS_DIR)/empresas.min.css ] ; \
	then \
		rm $(CSS_DIR)/empresas.min.css ; \
	fi;

	@if [ -a $(CSS_DIR)/clientes.min.css ] ; \
	then \
		rm $(CSS_DIR)/clientes.min.css ; \
	fi;

	@if [ -a $(CSS_DIR)/workspaces.min.css ] ; \
	then \
		rm $(CSS_DIR)/workspaces.min.css ; \
	fi;

	@if [ -a $(CSS_DIR)/eventos.min.css ] ; \
	then \
		rm $(CSS_DIR)/eventos.min.css ; \
	fi;

# index
	@echo index.min.css...
	@for file in $(INDEX) ; do \
        cat $$file >> $(CSS_DIR)/index.min.css; \
    done

# empresas
	@echo empresas.min.css...
	@for file in $(EMPRESAS) ; do \
        cat $$file >> $(CSS_DIR)/empresas.min.css; \
    done

# clientes
	@echo clientes.min.css...
	@for file in $(CLIENTES) ; do \
        cat $$file >> $(CSS_DIR)/clientes.min.css; \
    done

# workspaces
	@echo workspaces.min.css...
	@for file in $(WORKSPACES) ; do \
        cat $$file >> $(CSS_DIR)/workspaces.min.css; \
    done

# eventos
	@echo eventos.min.css...
	@for file in $(EVENTOS) ; do \
        cat $$file >> $(CSS_DIR)/eventos.min.css; \
    done

# limpieza
clean:
	@echo Borrando $(CSS_DIR_MIN) ...
	@rm $(CSS_DIR_MIN)/*.css
	@echo Borrando $(CSS_DIR) ...
	@rm $(CSS_DIR)/*.css
	@echo Borrando $(LESS_DEPENDENCIES_DIR) ...
	@rm $(LESS_DEPENDENCIES_DIR)/*.d

#rem:
#	EJEMPLO DE COMO USAR SHELL EN UN MAKEFILE
#	for file in $(CSS_DIR)/* ; do \
#    	var=`wc -c $$file`;	  \
#    	bytes=`echo $$var|cut -f1 -d " "` \
#    	if [ $$bytes -ge 0 ] ; then \
#    		echo "yes"; \
#    	else \
#    		echo "no"; \
#    	fi \
#	done

# ***************************************************
# *													*
# *		Phony para llamar a los flags con make 		*
# *													*
# ***************************************************
.PHONY: all clean min merge modules