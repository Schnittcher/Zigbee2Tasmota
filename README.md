[![Version](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
![Version](https://img.shields.io/badge/Symcon%20Version-5.5%20%3E-blue.svg)
[![License](https://img.shields.io/badge/License-CC%20BY--NC--SA%204.0-green.svg)](https://creativecommons.org/licenses/by-nc-sa/4.0/)
[![Check Style](https://github.com/Schnittcher/Tasmota2Zigbee/workflows/Check%20Style/badge.svg)](https://github.com/Schnittcher/Zigbee2Tasmota/actions)

# Zigbee2Tasmota
Dieses Gerät baut eine Verbindung zwischen IP-Symcon und einer Tasmota Zigbee Bridge auf.

## Inhaltverzeichnis
1. [Voraussetzungen](#1-voraussetzungen)
2. [Enthaltene Module](#2-enthaltene-module)
3. [Installation](#3-installation)
4. [Konfiguration in IP-Symcon](#4-konfiguration-in-ip-symcon)
5. [Spenden](#5-spenden)
6. [Lizenz](#6-lizenz)

## 1. Voraussetzungen

* mindestens IPS Version 5.2
* MQTT Server oder MQTT Client

## 2. Enthaltene Module

### Bridge
Mit dieser Instanz werden die Geräte gesucht und können in IPS angelegt werden, desweiteren ist es möglich über diese Instanz Geräte mit der Zigbee2Tasmota Bridge zu pairen oder zu löschen.

### Connect
Diese Instanz stellt die Verbindung zwischen MQTT Server / Client und den Instanzen her.

### Device
Diese Instanz stellt die Geräte dar, welche mit der Bridge gepairt sind.

## 3. Installation

Über den IP-Symcon Module Store.

## 4. Konfiguration in IP-Symcon
Das Modul kann mit dem internen MQTT Server betrieben werden, oder aber mit einem externen MQTT Broker.
Wenn ein externer MQTT Broker verwendet werden soll, dann muss aus dem Module Store der MQTTClient installiert werden.

Standardmäßig wird der MQTT Server bei der Connect Instanz als Parent hinterlegt, wenn aber ein externer Broker verwendet werden soll, muss der MQTT Client per Hand angelegt werden und in der Geräteinstanz unter "Gateway ändern" ausgewählt werden.

Die weitere Dokumentation bitte den einzelnen Modulen entnehmen.

## 5. Spenden

Dieses Modul ist für die nicht kommzerielle Nutzung kostenlos, Schenkungen als Unterstützung für den Autor werden hier akzeptiert:    

<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK4JRP87XLSHW" target="_blank"><img src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_LG.gif" border="0" /></a> <a href="https://www.amazon.de/hz/wishlist/ls/3JVWED9SZMDPK?ref_=wl_share" target="_blank">Amazon Wunschzettel</a>

## 6. Lizenz

[CC BY-NC-SA 4.0](https://creativecommons.org/licenses/by-nc-sa/4.0/)
