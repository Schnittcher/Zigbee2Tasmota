# Birdge
Mit dieser Instanz werden die Geräte gesucht und können in IPS angelegt werden, desweiteren ist es möglich über diese Instanz Geräte mit der Tasmota2Zigbee Bridge zu pairen oder zu löschen.

## Inhaltverzeichnis
1. [Konfiguration](#1-konfiguration)
2. [Funktionen](#2-funktionen)

## 1. Konfiguration

Feld | Beschreibung
------------ | -------------
Aktiviere Pairing Modus | Mit diesem Button kann der Piaring Modus der Bridge aktiviert werden.
Deaktviere Pairing Modus | Mit diesem Button kann der Piaring Modus der Bridge deaktiviert werden.
Zigbee Geräte| In dem Konfigurator werden alle Geräte angezeigt, welche mit der Bridge gepairt sind.
Aktualisiere Geräte| Mit diesem Button kann die Liste aktualisiert werden, dadurch werden die Geräte erneut eingelesen.
Lösche Gerät (Tasmota Uupair)| Mit diesem Gerät kann ein Gerät von der Tasmota Zigbee Bridge entfernt werden. Das Gerät müsste also erneut angelernt werden, wenn dies wieder genutzt werden soll.

## 2. Funktionen

### TZ_Pairing($InstanceID)
Mit dieser Funktion kann der Piaring Modus aktiviert werden.

```php
TZ_Pairing(12345);
```

### TZ_forgetDevice($InstanceID, $Device)
Mit dieser Funktion kann ein Gerät von der Tasmota Zigbee Bridge entfernt werden.

```php
TZ_forgetDevice(12345, '0x2D3F);
```

### TZ_relaodDevices($InstanceID)
Mit dieser Funktion können die Gerät neu eingelesen werden.

```php
TZ_relaodDevices(12345);
```