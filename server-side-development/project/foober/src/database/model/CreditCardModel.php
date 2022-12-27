<?php

/**
 * A database model to construct new credit cards.
 * 
 * @author Michael Muzzarelli
 */
class CreditCardModel {

    /**
     * A unique identifier meant to link a credit card record with a rider record as a FK.
     */
    public int $riderId;

    /**
     * A hashed value built via a plaintext credit card number.
     */
    public string $cardNumber;

    /**
     * A hashed value built via a plaintext card expiration date in MM-YY form.
     */
    public string $cardExpiration;

    /**
     * A hashed value built via a plaintext card CVV code.
     */
    public string $cardCvv;

    /**
     * A valid cardholder name - first and last.
     */
    public string $cardholderName;

    /**
     * Construct a credit card database model.
     * 
     * @param int $riderId              a unique identifier meant to link a credit card record with a rider record.
     * @param string $cardNumber        a hashed value built via a plaintext credit card number.
     * @param string $cardExpiration    a hashed value built via a plaintext card expiration date in MM-YY form.
     * @param string $cardCvv           a hashed value built via a plaintext card CVV code.
     * @param string $cardholderName    a valid cardholder name - first and last.
     */
    public function __construct(int $riderId, string $cardNumber, string $cardExpiration, string $cardCvv, string $cardholderName) {
        $this->riderId = $riderId;
        $this->cardNumber = $cardNumber;
        $this->cardExpiration = $cardExpiration;
        $this->cardCvv = $cardCvv;
        $this->cardholderName = $cardholderName;
    }
}