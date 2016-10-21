<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Marks a section of a template to be escaped or not.
 *
 * <pre>
 * {% autoescape true %}
 *   Everything will be automatically escaped in this block
 * {% endautoescape %}
 *
 * {% autoescape false %}
 *   Everything will be outputed as is in this block
 * {% endautoescape %}
 *
 * {% autoescape true js %}
 *   Everything will be automatically escaped in this block
 *   using the js escaping strategy
 * {% endautoescape %}
 * </pre>
 */
class Twig_TokenParser_AutoEscape extends Twig_TokenParser
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
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();

        if ($stream->test(Twig_Token::BLOCK_END_TYPE)) {
            $value = 'html';
        } else {
            $expr = $this->parser->getExpressionParser()->parseExpression();
            if (!$expr instanceof Twig_Node_Expression_Constant) {
<<<<<<< HEAD
                throw new Twig_Error_Syntax('An escaping strategy must be a string or a Boolean.', $stream->getCurrent()->getLine(), $stream->getFilename());
=======
                throw new Twig_Error_Syntax('An escaping strategy must be a string or a bool.', $stream->getCurrent()->getLine(), $stream->getFilename());
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            }
            $value = $expr->getAttribute('value');

            $compat = true === $value || false === $value;

            if (true === $value) {
                $value = 'html';
            }

            if ($compat && $stream->test(Twig_Token::NAME_TYPE)) {
<<<<<<< HEAD
                @trigger_error('Using the autoescape tag with "true" or "false" before the strategy name is deprecated.', E_USER_DEPRECATED);
=======
                @trigger_error('Using the autoescape tag with "true" or "false" before the strategy name is deprecated since version 1.21.', E_USER_DEPRECATED);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

                if (false === $value) {
                    throw new Twig_Error_Syntax('Unexpected escaping strategy as you set autoescaping to false.', $stream->getCurrent()->getLine(), $stream->getFilename());
                }

                $value = $stream->next()->getValue();
            }
        }

        $stream->expect(Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node_AutoEscape($value, $body, $lineno, $this->getTag());
    }

    public function decideBlockEnd(Twig_Token $token)
    {
        return $token->test('endautoescape');
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
        return 'autoescape';
    }
}
