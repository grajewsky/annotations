# Annotations Reader for PHP

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

Stetament `$a = Annotations::read(EntityTestClass::class);` return Annotations class where you call `$a->annotations($accessor)` method  where string key is accessor when values  are:
- pass const `Annotations::ALL_ANNOTATINS` - all annotations when key is accessor(class and properties/methods names) and values are `Array<Annotation>`
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


