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
Xiaomi | lumi.sensor_cube | Aqara Cube Controller | Aktion, Seite, Von Seite, Drehen
Xiaomi | lumi.sensor_cube.aqgl01 | Aqara Cube Controller | Aktion, Seite, Von Seite, Drehen
Xiaomi | lumi.sen_ill.mgl01' | Mijia Light Intensity Sensor | Beleuchtungsstärke
Xiaomi | lumi.sensor_motion | Aqara Human Body Motion and Illuminance Sensor | Bewegung
Xiaomi | lumi.sensor_motion.aq2 | Aqara Human Body Motion and Illuminance Sensor | Bewegung, Beleuchtungsstärke
Xiaomi | lumi.sensor_swit | Aqara Wireless Mini Switch | Status
Xiaomi | lumi.sensor_smoke | Honeywell Fire Alarm Smoke Detector | Rauchtidchte, Bewegung, State
Xiaomi | lumi.lock.v1 | Vima Smart Lock Cylinder | 
Xiaomi | lumi.sens | Mijia Temperature & Humidity Sensor | Temperatur, Luftfeuchte
Xiaomi | lumi.sensor_ht | Mijia Temperature & Humidity Sensor | Temperatur, Luftfeuchte
Xiaomi | lumi.vibration.aq1 | Aqara Vibration Sensor | Vibration
Xiaomi | lumi.remote.b1acn01 | Aqara Wireless Mini Switch | Klick, Aktion
Xiaomi | lumi.sensor_switch.aq2 | Aqara Wireless Mini Switch | Status
Xiaomi | lumi.remote.b286acn01 | Aquara Wireless Remote Switch (Double Rocker) | Klick, Aktion
OSRAM | Plug 01 | Smart+ Plug | Status
OSRAM | Gardenpole RGBW-Lightify | LIGHTIFY Gardenpole | Status, Helligkeit, Farbe, Farbtemperatur
OSRAM | Classic A60 RGBW | Classic A60 RGBW | Status, Helligkeit, Farbe, Farbtemperatur
OSRAM | Classic A60 W clear - LIGHTIFY | Classic A60 W clear - LIGHTIFY | Status, Helligkeit
OSRAM | CLA60 RGBW OSRAM | CLA60 RGBW OSRAM | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LCT015 | Hue White and Color Ambiance (2017) | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LCD014 | Hue White and Color Ambiance (2016) | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LCD010 | Hue White and Color Ambiance (2016) | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LCT007 | Hue White and Color Ambiance (2015) | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LCT001 | Hue White and Color Ambiance (2012) | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LCT012 | Hue White and Color Ambiance | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LWB010 | Hue White | Status, Helligkeit
Philips HUE | LTW012 | HUE White Ambiance E14 LED Kerze | Status, Helligkeit, Farbtemperatur
Philips HUE | RWL021 | HUE Dimmer Switch (EU) | Status, DimmerStepDown, DimmerStepUp
Philips HUE | SML001 | HUE Motion Sensor | Bewegung, Beleuchtungsstärke, Temperatur
Philips HUE | LWA001 | Philips Hue White Ambiance E27 LED Lampe | Status, Helligkeit
Philips HUE | 4090431P9 | Philips Hue White & Col. Amb. LED Tischleuchte | Status, Helligkeit, Farbe, Farbtemperatur
Philips HUE | LLC010 | Philips Hue Iris | Status, Helligkeit, Farbe
IKEA | TRADFRI on/off switch | TRÅDFRI Kabelloser Dimmer | Status, DimmerMove
IKEA | TRADFRI remote control | TRÅDFRI Fernbedienung | Status, DimmerUp, DimmerStepDown, Pfeil Klick, DimmerMove
IKEA | TRADFRI transformer 30W | TRÅDFRI Treiber für Fernbedienung, 30W | Status, Helligkeit
IKEA | TRADFRI transformer 10W | TRÅDFRI Treiber für Fernbedienung, 10W | Status, Helligkeit
IKEA | TRADFRI Driver 10W | TRÅDFRI Treiber für Fernbedienung, 10W | Status, Helligkeit
IKEA | TRADFRI Driver 30W | TRÅDFRI Treiber für Fernbedienung, 30W | Status, Helligkeit
IKEA | TRADFRI bulb E14 WS 470lm | LED-Leuchtmittel E14 470 lm | Status, Helligkeit, Farbtemperatur
IKEA | TRADFRI bulb E27 WW 806lm | TRÅDFRI LED-Leuchtmittel E27 806 lm | Status, Helligkeit
IKEA | SYMFONISK Sound Controller | SYMFONISK Sound Controller | Status, DimmerMove, DimmerStop
IKEA | TRADFRI bulb E27 CWS opal 600lm | TRADFRI bulb E27 CWS opal 600lm |Status, Helligkeit, Farbtemperatur, Farbe
IKEA | TRADFRI control outlet | Tradfri Control Outlet | Status
IKEA | TRADFRI SHORTCUT Button | TRADFRI SHORTCUT Button | Status
IKEA | TRADFRI bulb GU10 W 400lm | TRADFRI bulb GU10 W 400lm | Status, Helligkeit
TuYa | TS0011 | TuYa Valve TS0011 | Bewegung
Sonoff | WB01 | SNZB-01 | Status
Sonoff | TH01 | SNZB-02 | Temperatur, Luftfeuchte
Sonoff | 66666 | SNZB-02 | Temperatur, Luftfeuchte
Sonoff | MS01 | SNZB-03 | Status
Sonoff | DS01 | SNZB-04 | Bewegung
Sonoff | 01MINIZB | ZBMINI | Status
Sonoff | BASICZBR3 | Sonoff BASICZBR3 | Status
Lidl | TY0202 | SILVERCREST® Bewegungsmelder »Zigbee Smart Home«, Infrarot-Sensor, Anti-Manipulationsalarm | Bewegung, Manipuliert
Lidl | TS0502A | LIVARNO LUX® Leuchtmittel Lichtfarbensteuerung »Zigbee Smart Home« | Status, Helligkeit, Farbtemperatur
Lidl | TS0505A | LIVARNO LUX® Leuchtmittel RGB, dimmbar, »Zigbee Smart Home« | Status, Helligkeit, Farbtemperatur, Farbe
Lidl | TS1001 | Livarno Lux Remote Control Dimmer | Status, DimmerStepDown, DimmerStepUp
Lidl | TS011F | SILVERCREST® Steckdose Zwischenstecker, »Zigbee Smart Home« | Status
Schwaiger / Heiman | SMOK_YDLV10 | Rauchmelder | Status
Schwaiger / Heiman | COSensor-EM | Carbon Monoxide Detector | Status
LEDVANCE | Plug Z3 | SMART+ ZB PLUG EU | Status
LEDVANCE | CLA60 RGBW Z3 | Osram Smart+ Classic E27 Multicolor | Status, Helligkeit, Farbe, Farbtemperatur
Blitzwolf | TS0121 | Blitzwolf SHP13 | Status
LINKIND | LINKIND bulb E27 9W A19 800lm | LINKIND bulb E27 9W A19 800lm | Status, Helligkeit, Farbtemperatur
Müller Licht | Müller Licht Tint LED RGB Bulb | ZBT-ExtendedColor | Status, Helligkeit, Farbtemperatur, Farbe
Müller Licht | Müller Licht Tint LED Bulb | ZBT-ColorTemperature | Status, Helligkeit, Farbtemperatur
Müller Licht | Müller-Licht Tint Fernbedienung | ZBT-Remote-ALL-RGBW | Status, Helligkeit, Farbtemperatur, Farbe X, Farbe Y, Gruppe, Müller Licht Modus
Sunricher | Synergy 21 LED Controller EOS 10 ZigBee CV Controller+Netzteil 4-Kanal 100W RGB-W 12V | RGB-CCT | Status, Helligkeit, Farbtemperatur, Farbe
Sunricher | Synergy 21 LED Controller EOS 10 ZigBee Remote Touch RGBW 4scenes
 | ZGRC-TEUR-002 | Status, Helligkeit, Farbtemperatur, Farbe X, Farbe Y, HueMove, DimmerStop, DimmerMove
 Legrand | Micromodule switch | Micromodule switch | Status
 Legrand | Connected outlet | Connected outlet | Status
 Paulmann | 500.48 | YourLED Dimming and Switching Controller 60W | Status, Dimmer
Innr | RB 185 C | Innr RB 185 C | Status, Helligkeit, Farbtemperatur, Farbe
Gierier | TS0121 | Smart Power Stecker  | Status
Gierier | TS0001 | Smart Licht Schalter Modul  | Status


Geräte, welche nicht in dieser Liste aufgeführt sind, werden nicht mit dem Modul funktionieren.
Wenn ich dieser Geräte dem Modul hinzufügen soll, dann benötige ich ein Debug von dem Gerät.

Dazu in der Kosnole folgenden Befehl ausführen: zbstatus 0xABCD (ABCD natürlich durich die Geräte ID ersetzen)
Die Antwort daruf bitte im Forum posten.

Als nächstes alle Aktionen ausführen, welche am Gerät ausgeführt werden können.
Die Ergebnisse davon ebenfalls im Forum posten.

Sollten keine Aktionen durchgeführt werden können, wie zum Beispiel bei einer Lampe, dann bitte nur den ersten Schritt druchführen.