# Annotations Reader for PHP ![](https://travis-ci.org/grajewsky/annotations.svg?branch=master)

### Quick Use

```php
use \Annotations\Annotations;
/**
 * @Sample value=1
 * @SampleTest value=1, test=2
 **/
class EntityTestClass {
    /**
     * @Test
     */
    private $test = 1;
}
$annotations = Annotations::read(EntityTestClass::class);

print_r($annotations->annotations(Annotations::ALL_ANNOTATIONS));
```

#### About structure

Statement `$a = Annotations::read(EntityTestClass::class);` return Annotations class where you can induce `$a->annotations($accessor)` method, where the parameter is the key is the character string, where the values are:
- pass const `Annotations::ALL_ANNOTATINS` - all the annotations(class and properties/methods) result is `Array<Annotation>`
- pass const `Annotations::CLASS_ANNOTATIONS` - accessor return Array<String, Annotation> - annotations of class
- pass property name or method to return annotations`

Output:
```
Array
(
    [class] => Array
        (
            [Sample] => Annotations\Domains\Annotation Object
                (
                    [fields:Annotations\Domains\Annotation:private] => Array
                        (
                            [value] => 1
                        )

                    [name:Annotations\Domains\Annotation:private] => Sample
                )

            [SampleTest] => Annotations\Domains\Annotation Object
                (
                    [fields:Annotations\Domains\Annotation:private] => Array
                        (
                            [value] => 1
                            [test] => 2
                        )

                    [name:Annotations\Domains\Annotation:private] => SampleTest
                )

        )

    [test] => Array
        (
            [ORM] => Annotations\Domains\Annotation Object
                (
                    [fields:Annotations\Domains\Annotation:private] => Array
                        (
                            [table] => entity
                        )

                    [name:Annotations\Domains\Annotation:private] => ORM
                )

            [Test] => Annotations\Domains\Annotation Object
                (
                    [fields:Annotations\Domains\Annotation:private] => Array
                        (
                        )

                    [name:Annotations\Domains\Annotation:private] => Test
                )

        )

)
```


