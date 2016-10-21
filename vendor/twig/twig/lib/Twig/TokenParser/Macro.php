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
 * Defines a macro.
 *
 * <pre>
 * {% macro input(name, value, type, size) %}
 *    <input type="{{ type|default('text') }}" name="{{ name }}" value="{{ value|e }}" size="{{ size|default(20) }}" />
 * {% endmacro %}
 * </pre>
 */
class Twig_TokenParser_Macro extends Twig_TokenParser
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
        $name = $stream->expect(Twig_Token::NAME_TYPE)->getValue();

        $arguments = $this->parser->getExpressionParser()->parseArguments(true, true);

        $stream->expect(Twig_Token::BLOCK_END_TYPE);
        $this->parser->pushLocalScope();
        $body = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
        if ($token = $stream->nextIf(Twig_Token::NAME_TYPE)) {
            $value = $token->getValue();

            if ($value != $name) {
<<<<<<< HEAD
                throw new Twig_Error_Syntax(sprintf('Expected endmacro for macro "%s" (but "%s" given)', $name, $value), $stream->getCurrent()->getLine(), $stream->getFilename());
=======
                throw new Twig_Error_Syntax(sprintf('Expected endmacro for macro "%s" (but "%s" given).', $name, $value), $stream->getCurrent()->getLine(), $stream->getFilename());
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            }
        }
        $this->parser->popLocalScope();
        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        $this->parser->setMacro($name, new Twig_Node_Macro($name, new Twig_Node_Body(array($body)), $arguments, $lineno, $this->getTag()));
    }

    public function decideBlockEnd(Twig_Token $token)
    {
        return $token->test('endmacro');
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
        return 'macro';
    }
}
