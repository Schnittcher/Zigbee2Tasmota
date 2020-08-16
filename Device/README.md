# Device
Diese Instanz stellt die Geräte dar, welche mit der Bridge gepairt sind.

## Inhaltverzeichnis
1. [Konfiguration](#1-konfiguration)
2. [Funktionen](#2-funktionen)

## 1. Konfiguration

Feld | Beschreibung
------------ | -------------
Gerät | Name des Zigbee Gerätes, welches mit dieser Instanz abgebildet werden soll.
Model| Der Gerätetyp von dem Gerät, damit die Instanz weiß, welche Variablen angelegt werden müssen. - ReadOnly

## 2. Funktionen

### RequestAction($VariableID, $Value)
Mit dieser Funktion können die Variablen geschaltet werden.

```php
RequestAction(12345, true); // Gerät einschalten
```