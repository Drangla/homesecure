<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Carbon;

/**
 * Class Flug
 *
 * @package App
 * @property int $Flugnummer
 * @property string $Abflugplanet
 * @property string $Zielplanet
 * @property Carbon|null $Abflugzeit
 * @property Carbon|null $Ankunftszeit
 * @method static Builder newModelQuery()
 * @method static Builder newQuery()
 * @method static Builder query()
 * @mixin Eloquent
 */
class Flug extends Model
{
    protected $table = 'Flug';
}
