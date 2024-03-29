<?php

namespace App\Models\Resources;

use App\Traits\DataCryptable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory, DataCryptable;

    protected $encryptedKey = 'hn';

    protected $fillable = [
        'hn',
        'slug',
        'profile',
    ];

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }

    /**
     * Set field 'hn'.
     *
     * @param string $value
     */
    public function setHnAttribute($value)
    {
        $this->attributes['hn'] = $this->encryptField($value);
        $this->attributes['mini_hash'] = $this->miniHash($value);
    }

    /**
     * Get field 'hn'.
     *
     * @return string
     */
    public function getHnAttribute()
    {
        return $this->decryptField($this->attributes['hn']);
    }

    /**
     * Get field 'dob'.
     *
     * @return date
     */
    public function getDobAttribute()
    {
        if (! $this->profile['dob']) {
            return null;
        }

        return Carbon::create($this->profile['dob']);
    }

    public function setProfileAttribute($data)
    {
        $this->attributes['profile'] = $this->encryptField(empty($data) ? null : json_encode($data));
    }

    public function getProfileAttribute()
    {
        return json_decode($this->decryptField($this->attributes['profile']), true);
    }

    public function getFullNameAttribute()
    {
        return implode(' ', [
            $this->profile['title'],
            $this->profile['first_name'],
            $this->profile['last_name'],
        ]);
    }

    public function getFirstNameAttribute()
    {
        return $this->profile['first_name'];
    }

    public function getAgeInYearsAttribute()
    {
        if (! $this->dob) {
            return null;
        }

        return now()->diffInYears($this->dob);
    }

    public function getGenderAttribute()
    {
        return $this->profile['gender'];
    }

    public function getLabelAttribute()
    {
        return 'HN '.$this->hn.' '.$this->full_name;
    }
}
