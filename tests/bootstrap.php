<?php

require __DIR__ . '/../vendor/autoload.php';

\VCR\VCR::configure()->enableLibraryHooks(['stream_wrapper', 'curl']);

\VCR\VCR::turnOn();
