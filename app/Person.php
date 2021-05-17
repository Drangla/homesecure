<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Carbon;

/**
 * Class Person
 *
 * @package App
 * @property int $SVNR
 * @property Carbon|null $Geburtsdatum
 * @property string $vorname
 * @property string $nachname
 * @property string $Ort
 * @property int $PLZ
 * @property string $Strasse
 * @property string $Hausnummer
 * @method static Builder newModelQuery()
 * @method static Builder newQuery()
 * @method static Builder query()
 * @mixin Eloquent
 */
class Person extends Model
{
    protected $table = 'Person';
}
