# Refactoring and Bad Code Smell

## What is the Law of Demeter?

The [Law of Demeter](https://en.wikipedia.org/wiki/Law_of_Demeter), or principle of least knowledge, is a design 
guideline for developing software that states the following about each class or 'unit': (1) each unit should have only
limited knowledge about other units; (2) each unit should only talk to closely related units; and (3) each unit should
only talk to immediate friends.

In practice, this would mean that object `a` can call a function of an instance object `b` but should not 
'reach through' object `b` to access another object, `c`, to call a function within it. This would imply that `a`
requires greater knowledge of the internal structure of object `b`. Instead, object `b` should be modified to directly
serve the request or object `a` should be permitted a direct call to object `c`. The principle is followed if only 
object `b` is aware of the internal structure of object `b`.

Example: `a.b().c()` could be rewritten as `a.c()`.

## Violation is a Bad Code Smell

As discussed in class and examined above, if object `a` reaches through several instance objects (e.g., 
`a.b().c().d().e()`) and the code must be refactored to fix a bug, the refactoring process is further complicated by
the need to refactor multiple classes to ensure no other bugs are created. Software engineering is already complex
enough, and we should make every effort to manage the complexities as they are presented.