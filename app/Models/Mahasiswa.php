<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * App\Models\Mahasiswa
 *
 * @property int $id
 * @property string $nama
 * @property string $kelas
 * @property string $jurusan
 * @property string $nomor_handphone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MahasiswaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereJurusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereNomorHandphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "student";
    public $timestamps= false; 
    protected  $primaryKey = 'nim';

    protected $fillable = [
        'nim',
        'name',
        'class_id',
        'major',
        'address',
        'email',
        'profile_picture',
      
        
    ];
    public function class(){
        return $this->belongsTo(ClassModel::class);

}
public function course(){
    return $this->belongsToMany(CourseModel::class, 'courser','id_student', 'course_id')->withPivot('score');
}
}