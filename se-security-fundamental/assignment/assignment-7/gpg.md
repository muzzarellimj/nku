# GnuPG (GPG) in OpenPGP

GPG, or GNU PGP, is the open source implementation of PGP. It can be installed on macOS with `brew install gnupg` or on
Windows with `choco install gnupg`. A public/private key pair can be generated with `gpg -gen-key` and a passphrase. A
directory is then created to store these keys. The public key can then be exported as `public.key` with 
`gpg -export -a '<passphrase>' > public.key` and can be distributed to computers and/or users whom they may need to 
share information with. The key can then be imported with `gpg -import public.key`, and the success can be verified
with `gpg -list-keys`. Encryption is completed with `gpg -recipient <recipient-passphrase> -encrypt <file>` and
decryption is completed with `gpg -d <file>.gpg`. 