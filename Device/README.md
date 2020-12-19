# Device
Diese Instanz stellt die Geräte dar, welche mit der Bridge gepairt sind.

## Inhaltverzeichnis
1. [Konfiguration](#1-konfiguration)
2. [Funktionen](#2-funktionen)
3. [Unterstützte Geräte](#3-unterstützte-geräte)

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

## 3. Unterstützte Geräte

Hersteller | ModelID | Gerät | Variablen
------------ | ------------- | ------------ | ------------
Xiaomi | lumi.sensor_wleak.aq1 | Aqara Water Leak Sensor | Alarm
Xiaomi | lumi.weather | Aqara Temperature, Humidity and Pressure Sensor | Temperatur, Luftfeuchte
Xiaomi | lumi.sensor_magnet | Aqara Fenster- / Türkontakt | Status
Xiaomi | lumi.sensor_magnet.aq2 | Aqara Fenster- / Türkontakt | Status
Xiaomi | lumi.sensor_cube | Aqara Cube Controller | Aktion, Seite, Von Seite
Xiaomi | lumi.sen_ill.mgl01' | Mijia Light Intensity Sensor | Beleuchtungsstärke
Xiaomi | lumi.sensor_motion | Aqara Human Body Motion and Illuminance Sensor | Bewegung
Xiaomi | lumi.sensor_motion.aq2 | Aqara Human Body Motion and Illuminance Sensor | Bewegung, Beleuchtungsstärke
Xiaomi | lumi.sensor_swit | Aqara Wireless Mini Switch | Status
Xiaomi | lumi.sensor_smoke | Honeywell Fire Alarm Smoke Detector | Rauchtidchte, Bewegung
Xiaomi | lumi.lock.v1 | Vima Smart Lock Cylinder | 
Xiaomi | lumi.sens | Mijia Temperature & Humidity Sensor | Temperatur, Luftfeuchte
Xiaomi | lumi.sensor_ht | Mijia Temperature & Humidity Sensor | Temperatur, Luftfeuchte
Xiaomi | lumi.vibration.aq1 | Aqara Vibration Sensor | Vibration
Xiaomi | lumi.remote.b1acn01 | Aqara Wireless Mini Switch | Klick, Aktion
OSRAM | Plug 01 | Smart+ Plug | Status
OSRAM | Gardenpole RGBW-Lightify | LIGHTIFY Gardenpole | Status, Helligkeit, Farbe, Farbtemperatur
OSRAM | Classic A60 RGBW | Classic A60 RGBW | Status, Helligkeit, Farbe, Farbtemperatur
OSRAM | Classic A60 W clear - LIGHTIFY | Classic A60 W clear - LIGHTIFY | Status, Helligkeit
Philips HUE | LCT015 | Hue White and Color Ambiance (2017) | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LCD014 | Hue White and Color Ambiance (2016) | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LCD010 | Hue White and Color Ambiance (2016) | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LCT007 | Hue White and Color Ambiance (2015) | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LCT001 | Hue White and Color Ambiance (2012) | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LWB010 | Hue White | Status, Helligkeit
Philips HUE | LTW012 | HUE White Ambiance E14 LED Kerze | Status, Helligkeit, Farbtemperatur
Philips HUE | RWL021 | HUE Dimmer Switch (EU) | Status, DimmerStepDown, DimmerStepUp
IKEA | TRADFRI on/off switch | TRÅDFRI Kabelloser Dimmer | Status, DimmerMove
IKEA | TRADFRI remote control | TRÅDFRI Fernbedienung | Status, DimmerUp, DimmerStepDown, Pfeil Klick, DimmerMove
IKEA | TRADFRI transformer 30W | TRÅDFRI Treiber für Fernbedienung, 30W | Status, Helligkeit
IKEA | TRADFRI transformer 10W | TRÅDFRI Treiber für Fernbedienung, 10W | Status, Helligkeit
IKEA | TRADFRI bulb E14 WS 470lm | LED-Leuchtmittel E14 470 lm | Status, Helligkeit, Farbtemperatur
TuYa | TS0011 | TuYa Valve TS0011 | Bewegung
Sonoff | TH01 | SNZB-02 | Temperatur, Luftfeuchte
Lidl | TY0202 | SILVERCREST® Bewegungsmelder »Zigbee Smart Home«, Infrarot-Sensor, Anti-Manipulationsalarm | Bewegung, Manipuliert
Lidl | TS0502A | LIVARNO LUX® Leuchtmittel Lichtfarbensteuerung »Zigbee Smart Home« | Status, Helligkeit, Farbtemperatur
SCHWAIGER | SMOK_YDLV10 | Schwaiger ZigBee Rauchmelder | Feuer, Manipuliert, Batterie schwach, Batterie

Geräte, welche nicht in dieser Liste aufgeführt sind, werden nicht mit dem Modul funktionieren.
Wenn ich dieser Geräte dem Modul hinzufügen soll, dann benötige ich ein Debug von dem Gerät.

Dazu in der Kosnole folgenden Befehl ausführen: zbstatus 0xABCD (ABCD natürlich durich die Geräte ID ersetzen)
Die Antwort daruf bitte im Forum posten.

Als nächstes alle Aktionen ausführen, welche am Gerät ausgeführt werden können.
Die Ergebnisse davon ebenfalls im Forum posten.

Sollten keine Aktionen durchgeführt werden können, wie zum Beispiel bei einer Lampe, dann bitte nur den ersten Schritt druchführen.
