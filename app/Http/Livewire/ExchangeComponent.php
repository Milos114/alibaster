<?php

namespace App\Http\Livewire;

use App\Models\Rate;
use App\Rules\CheckEmptyValue;
use App\Services\Order\OrderPurchase;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ExchangeComponent extends Component
{
    public $currencies;
    public $currency = Rate::EURO;
    public $amount;
    public $showResult = false;
    public $result;
    public $surchargeDollars;
    public $discountDollars;

    public function render(): Factory|View|Application
    {
        return view('livewire.exchange-component');
    }

    protected function rules(): array
    {
        return [
            'amount' => ['required', 'numeric', 'min:10', new CheckEmptyValue],
            'currency' => ['required', 'numeric', Rule::in(Rate::EURO, Rate::GBP, Rate::JPY)],
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function mount(): void
    {
        $this->currencies = Rate::pluck('currency', 'id');
    }

    public function updatedCurrency(): void
    {
        if ($this->amount === '') {
            $this->showResult = false;
            return;
        }
        $this->getAmount();
    }

    public function purchase(): void
    {
        $this->validate();

        OrderPurchase::process(amount: $this->amount, currency: $this->currency, usd: $this->result,
            surchargeDollars: $this->surchargeDollars, discountDollars: $this->discountDollars);

        $this->emit('currencyPurchased');

        $this->dispatchBrowserEvent('purchase:success', [
            'toast' => true,
            'showConfirmButton' => false,
            'timer' => '3000',
            'position' => 'top-end',
            'title' => 'Currency purchased',
            'icon' => 'success',
        ]);
    }

    public function updatedAmount(): void
    {
        $this->getAmount();
    }

    /**
     * @return void
     */
    protected function getAmount(): void
    {
        $this->result = $this->calculateTotalAmount();

        $this->showResult = true;
    }

    protected function calculateTotalAmount(): float|int
    {
        $rate = Rate::find($this->currency);

        $rawAmount = $rate->calculateRawAmount($this->amount);
        $this->surchargeDollars = $rate->calculateSurchargeDollars($rawAmount);
        $this->discountDollars = $rate->calculateDiscountDollars($rawAmount);

        return $rawAmount + $this->surchargeDollars - $this->discountDollars;
    }
}
