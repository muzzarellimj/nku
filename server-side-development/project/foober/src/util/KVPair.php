<?php

/**
 * A utility class to construct key-value pairs to be used as SQL selection conditions, SQL revision conditions, etc.
 * 
 * @author Michael Muzzarelli
 */
class KVPair {

    /**
     * The 'key' attribute in a key-value pair.
     */
    public string $key;

    /**
     * The 'value' attribute in a key-value pair.
     */
    public mixed $value;

    /**
     * Construct a key-value pair object.
     * 
     * @param mixed $key
     * @param mixed $value
     * 
     * @throws InvalidArgumentException 
     */
    public function __construct(mixed $key, mixed $value) {
        if (!$key) throw new InvalidArgumentException('KVPair construction requires a valid key argument.');

        $this->key = $key;
        $this->value = $value;
    }
}