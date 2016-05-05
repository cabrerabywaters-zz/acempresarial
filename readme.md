# Ac. Empresarial



## Instalación Laravel

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Dependencias

El proyecto debe ser montado en un servidor Linux e instalar PDFTOHTML y Ghostscript

```
sudo apt-get install poppler-utils
```
```
sudo apt-get install tesseract-ocr-spa
```

```
sudo apt-get install exactimage
```

```
sudo apt-get install imagemagick
```

```
sudo apt-get install rpm
```

```
 rpm -Uvh ImageMagick-7.0.1-0.x86_64.rpm
```

hocr2pdf

## Procesamiento de PDF CTE

Los archivos PDF de la CTE vienen bloqueados para modificación o copia, por lo que es necesario utilizar Ghostscript para poder generar una copia de este una vez que es subido. Para esto se puede utilizar el siguiente comando de consola:

```
gs -dSAFER -dBATCH -dNOPAUSE -sDEVICE=pdfwrite -sPDFPassword= -dPDFSETTINGS=/prepress -dPassThroughJPEGImages=true -sOutputFile=[NOMBRE_DEL_ARCHIVO_DE_SALIDA.pdf] [NOMBRE_DEL_ARCHIVO_ORIGINAL.pdf]
```
Una vez generada la copia del archivo, es necesario parsear el contenido de este a XML. Para eso se utiliza la herramienta PDFTOHTML que se encuentra presente en las poppler-utils instaladas anteriormente. Para hacer esto, se deberá utilizar el siguiente comando en la consola:

```
pdftohtml -xml -enc UTF-8 [NOMBRE_ARCHIVO_A_PROCESAR.pdf] [NOMBRE_ARCHIVO_SALIDA] 
```


