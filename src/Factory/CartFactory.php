<?php

namespace App\Factory;

use App\Entity\Cart;
use App\Repository\CartRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Cart>
 *
 * @method        Cart|Proxy create(array|callable $attributes = [])
 * @method static Cart|Proxy createOne(array $attributes = [])
 * @method static Cart|Proxy find(object|array|mixed $criteria)
 * @method static Cart|Proxy findOrCreate(array $attributes)
 * @method static Cart|Proxy first(string $sortedField = 'id')
 * @method static Cart|Proxy last(string $sortedField = 'id')
 * @method static Cart|Proxy random(array $attributes = [])
 * @method static Cart|Proxy randomOrCreate(array $attributes = [])
 * @method static CartRepository|RepositoryProxy repository()
 * @method static Cart[]|Proxy[] all()
 * @method static Cart[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Cart[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Cart[]|Proxy[] findBy(array $attributes)
 * @method static Cart[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Cart[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class CartFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Cart $cart): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Cart::class;
    }
}
