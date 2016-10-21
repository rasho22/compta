<?php

/*
 * This file is part of Twig.
 *
 * (c) 2011 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Evaluates an expression, discarding the returned value.
 */
class Twig_TokenParser_Do extends Twig_TokenParser
{
<<<<<<< HEAD
    /**
     * Parses a token and returns a node.
     *
     * @param Twig_Token $token A Twig_Token instance
     *
     * @return Twig_NodeInterface A Twig_NodeInterface instance
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function parse(Twig_Token $token)
    {
        $expr = $this->parser->getExpressionParser()->parseExpression();

        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node_Do($expr, $token->getLine(), $this->getTag());
    }

<<<<<<< HEAD
    /**
     * Gets the tag name associated with this token parser.
     *
     * @return string The tag name
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getTag()
    {
        return 'do';
    }
}
