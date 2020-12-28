<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Generic\ValueObject\PseudoNamespaceToNamespace;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Renaming\Rector\FileWithoutNamespace\PseudoNamespaceToNamespaceRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    // $parameters = $containerConfigurator->parameters();

    // Define what rule sets will be applied
    // $parameters->set(Option::SETS, []);

    // get services (needed for register a single rule)
    $services = $containerConfigurator->services();

    // register a single rule
    $services->set(PseudoNamespaceToNamespaceRector::class)
        ->call('configure', [[
            PseudoNamespaceToNamespaceRector::NAMESPACE_PREFIXES_WITH_EXCLUDED_CLASSES => ValueObjectInliner::inline(
                [
                    new PseudoNamespaceToNamespace('Fake_', []),
                ]
            ),
        ]]);
};
