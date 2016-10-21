<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form;

use Symfony\Component\Form\Exception\ExceptionInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Exception\InvalidArgumentException;

/**
 * The central registry of the Form component.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class FormRegistry implements FormRegistryInterface
{
    /**
     * Extensions.
     *
     * @var FormExtensionInterface[] An array of FormExtensionInterface
     */
    private $extensions = array();

    /**
     * @var FormTypeInterface[]
     */
    private $types = array();

    /**
<<<<<<< HEAD
=======
     * @var string[]
     */
    private $legacyNames = array();

    /**
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     * @var FormTypeGuesserInterface|false|null
     */
    private $guesser = false;

    /**
     * @var ResolvedFormTypeFactoryInterface
     */
    private $resolvedTypeFactory;

    /**
     * Constructor.
     *
     * @param FormExtensionInterface[]         $extensions          An array of FormExtensionInterface
     * @param ResolvedFormTypeFactoryInterface $resolvedTypeFactory The factory for resolved form types
     *
     * @throws UnexpectedTypeException if any extension does not implement FormExtensionInterface
     */
    public function __construct(array $extensions, ResolvedFormTypeFactoryInterface $resolvedTypeFactory)
    {
        foreach ($extensions as $extension) {
            if (!$extension instanceof FormExtensionInterface) {
                throw new UnexpectedTypeException($extension, 'Symfony\Component\Form\FormExtensionInterface');
            }
        }

        $this->extensions = $extensions;
        $this->resolvedTypeFactory = $resolvedTypeFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getType($name)
    {
        if (!isset($this->types[$name])) {
            $type = null;

            foreach ($this->extensions as $extension) {
                if ($extension->hasType($name)) {
                    $type = $extension->getType($name);
                    break;
                }
            }

            if (!$type) {
<<<<<<< HEAD
                throw new InvalidArgumentException(sprintf('Could not load type "%s"', $name));
=======
                // Support fully-qualified class names
                if (class_exists($name) && in_array('Symfony\Component\Form\FormTypeInterface', class_implements($name))) {
                    $type = new $name();
                } else {
                    throw new InvalidArgumentException(sprintf('Could not load type "%s"', $name));
                }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            }

            $this->resolveAndAddType($type);
        }

<<<<<<< HEAD
=======
        if (isset($this->legacyNames[$name])) {
            @trigger_error(sprintf('Accessing type "%s" by its string name is deprecated since version 2.8 and will be removed in 3.0. Use the fully-qualified type class name "%s" instead.', $name, get_class($this->types[$name]->getInnerType())), E_USER_DEPRECATED);
        }

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        return $this->types[$name];
    }

    /**
     * Wraps a type into a ResolvedFormTypeInterface implementation and connects
     * it with its parent type.
     *
     * @param FormTypeInterface $type The type to resolve
     *
     * @return ResolvedFormTypeInterface The resolved type
     */
    private function resolveAndAddType(FormTypeInterface $type)
    {
<<<<<<< HEAD
        $parentType = $type->getParent();

        if ($parentType instanceof FormTypeInterface) {
=======
        $typeExtensions = array();
        $parentType = $type->getParent();
        $fqcn = get_class($type);
        $name = $type->getName();
        $hasCustomName = $name !== $fqcn;

        if ($parentType instanceof FormTypeInterface) {
            @trigger_error(sprintf('Returning a FormTypeInterface from %s::getParent() is deprecated since version 2.8 and will be removed in 3.0. Return the fully-qualified type class name instead.', $fqcn), E_USER_DEPRECATED);

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            $this->resolveAndAddType($parentType);
            $parentType = $parentType->getName();
        }

<<<<<<< HEAD
        $typeExtensions = array();
=======
        if ($hasCustomName) {
            foreach ($this->extensions as $extension) {
                if ($x = $extension->getTypeExtensions($name)) {
                    @trigger_error(sprintf('Returning a type name from %s::getExtendedType() is deprecated since version 2.8 and will be removed in 3.0. Return the fully-qualified type class name instead.', get_class($x[0])), E_USER_DEPRECATED);

                    $typeExtensions = array_merge($typeExtensions, $x);
                }
            }
        }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        foreach ($this->extensions as $extension) {
            $typeExtensions = array_merge(
                $typeExtensions,
<<<<<<< HEAD
                $extension->getTypeExtensions($type->getName())
            );
        }

        $this->types[$type->getName()] = $this->resolvedTypeFactory->createResolvedType(
=======
                $extension->getTypeExtensions($fqcn)
            );
        }

        $resolvedType = $this->resolvedTypeFactory->createResolvedType(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            $type,
            $typeExtensions,
            $parentType ? $this->getType($parentType) : null
        );
<<<<<<< HEAD
=======

        $this->types[$fqcn] = $resolvedType;

        if ($hasCustomName) {
            // Enable access by the explicit type name until Symfony 3.0
            $this->types[$name] = $resolvedType;
            $this->legacyNames[$name] = true;
        }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * {@inheritdoc}
     */
    public function hasType($name)
    {
<<<<<<< HEAD
=======
        if (isset($this->legacyNames[$name])) {
            @trigger_error(sprintf('Accessing type "%s" by its string name is deprecated since version 2.8 and will be removed in 3.0. Use the fully-qualified type class name "%s" instead.', $name, get_class($this->types[$name]->getInnerType())), E_USER_DEPRECATED);
        }

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        if (isset($this->types[$name])) {
            return true;
        }

        try {
            $this->getType($name);
        } catch (ExceptionInterface $e) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeGuesser()
    {
        if (false === $this->guesser) {
            $guessers = array();

            foreach ($this->extensions as $extension) {
                $guesser = $extension->getTypeGuesser();

                if ($guesser) {
                    $guessers[] = $guesser;
                }
            }

            $this->guesser = !empty($guessers) ? new FormTypeGuesserChain($guessers) : null;
        }

        return $this->guesser;
    }

    /**
     * {@inheritdoc}
     */
    public function getExtensions()
    {
        return $this->extensions;
    }
}
