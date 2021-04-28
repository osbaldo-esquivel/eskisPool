<?php namespace App\Http\Requests\Hiit;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class Get extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'intervals' => 'required|integer',
            'hiit-length' => 'required|integer',
            'rest-length' => 'required|integer',
            'warmup-length' => 'required|integer',
            'cooldown-length' => 'required|integer',
        ];
    }

    public function getIntervals(): int
    {
        return (int) $this->input('intervals');
    }

    public function getHiitLength(): int
    {
        return (int) $this->input('hiit-length');
    }

    public function getRestLength(): int
    {
        return (int) $this->input('rest-length');
    }

    public function getWarmupLength(): int
    {
        return (int) $this->input('warmup-length');
    }

    public function getCooldownLength(): int
    {
        return (int) $this->input('cooldown-length');
    }

    public function getTimeFromNow(): Carbon
    {
        return Carbon::now()->addSeconds($this->getTotalLength());
    }

    private function getTotalLength(): int
    {
        return $this->getIntervals() * $this->getHiitLength()
            + ($this->getIntervals() * $this->getRestLength())
            + $this->getWarmupLength() + $this->getCooldownLength();
    }
}