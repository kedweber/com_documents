<?php

KService::get('com://site/documents.aliases')->setAliases();

echo KService::get('com://site/documents.dispatcher')->dispatch();