# Grassroots Caller

Make from CiviCRM the handset of your phone, in order to start a call or send a SMS. So no need to type the number into your phone and keep your hands on the keyboard.

 The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7.1+ (Maybe lower wil work, but it is developed on thi version)
* A Pushy.me account
* CiviCRM (*FIXME: 5.10r*)

## Configuration

The SetUp screen is found at `http://cu.l/civicrm/admin/setting/grassrootscaller` or `Administer -> Communications -> Grassrootscaller`

Enter the Api key and your phone token.

## Usage

New actions are found in the actions tab

![Screenshot](/images/screenshot.png) 

## Known Issues

* The actions are also visible when no valid phonenumber is available.
* No activity is recorded (actual this a feature, maybe for a lot of calls and sms this is not needed). It would be nice to have the option.
