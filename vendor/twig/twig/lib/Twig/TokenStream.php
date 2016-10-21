<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 * (c) 2009 Armin Ronacher
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Represents a token stream.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Twig_TokenStream
{
    protected $tokens;
    protected $current = 0;
    protected $filename;

<<<<<<< HEAD
    /**
     * Constructor.
     *
     * @param array  $tokens   An array of tokens
     * @param string $filename The name of the filename which tokens are associated with
     */
    public function __construct(array $tokens, $filename = null)
    {
        $this->tokens = $tokens;
        $this->filename = $filename;
=======
    private $source;

    /**
     * Constructor.
     *
     * @param array       $tokens   An array of tokens
     * @param string|null $filename The name of the filename which tokens are associated with
     * @param string|null $source   The source code associated with the tokens
     */
    public function __construct(array $tokens, $filename = null, $source = null)
    {
        $this->tokens = $tokens;
        $this->filename = $filename;
        $this->source = $source ? $source : '';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * Returns a string representation of the token stream.
     *
     * @return string
     */
    public function __toString()
    {
        return implode("\n", $this->tokens);
    }

    public function injectTokens(array $tokens)
    {
        $this->tokens = array_merge(array_slice($this->tokens, 0, $this->current), $tokens, array_slice($this->tokens, $this->current));
    }

    /**
     * Sets the pointer to the next token and returns the old one.
     *
     * @return Twig_Token
     */
    public function next()
    {
        if (!isset($this->tokens[++$this->current])) {
<<<<<<< HEAD
            throw new Twig_Error_Syntax('Unexpected end of template', $this->tokens[$this->current - 1]->getLine(), $this->filename);
=======
            throw new Twig_Error_Syntax('Unexpected end of template.', $this->tokens[$this->current - 1]->getLine(), $this->filename);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        }

        return $this->tokens[$this->current - 1];
    }

    /**
     * Tests a token, sets the pointer to the next one and returns it or throws a syntax error.
     *
     * @return Twig_Token|null The next token if the condition is true, null otherwise
     */
    public function nextIf($primary, $secondary = null)
    {
        if ($this->tokens[$this->current]->test($primary, $secondary)) {
            return $this->next();
        }
    }

    /**
     * Tests a token and returns it or throws a syntax error.
     *
     * @return Twig_Token
     */
    public function expect($type, $value = null, $message = null)
    {
        $token = $this->tokens[$this->current];
        if (!$token->test($type, $value)) {
            $line = $token->getLine();
<<<<<<< HEAD
            throw new Twig_Error_Syntax(sprintf('%sUnexpected token "%s" of value "%s" ("%s" expected%s)',
=======
            throw new Twig_Error_Syntax(sprintf('%sUnexpected token "%s" of value "%s" ("%s" expected%s).',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                $message ? $message.'. ' : '',
                Twig_Token::typeToEnglish($token->getType()), $token->getValue(),
                Twig_Token::typeToEnglish($type), $value ? sprintf(' with value "%s"', $value) : ''),
                $line,
                $this->filename
            );
        }
        $this->next();

        return $token;
    }

    /**
     * Looks at the next token.
     *
     * @param int $number
     *
     * @return Twig_Token
     */
    public function look($number = 1)
    {
        if (!isset($this->tokens[$this->current + $number])) {
<<<<<<< HEAD
            throw new Twig_Error_Syntax('Unexpected end of template', $this->tokens[$this->current + $number - 1]->getLine(), $this->filename);
=======
            throw new Twig_Error_Syntax('Unexpected end of template.', $this->tokens[$this->current + $number - 1]->getLine(), $this->filename);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        }

        return $this->tokens[$this->current + $number];
    }

    /**
     * Tests the current token.
     *
     * @return bool
     */
    public function test($primary, $secondary = null)
    {
        return $this->tokens[$this->current]->test($primary, $secondary);
    }

    /**
     * Checks if end of stream was reached.
     *
     * @return bool
     */
    public function isEOF()
    {
        return $this->tokens[$this->current]->getType() === Twig_Token::EOF_TYPE;
    }

    /**
     * Gets the current token.
     *
     * @return Twig_Token
     */
    public function getCurrent()
    {
        return $this->tokens[$this->current];
    }

    /**
<<<<<<< HEAD
     * Gets the filename associated with this stream.
     *
     * @return string
=======
     * Gets the filename associated with this stream (null if not defined).
     *
     * @return string|null
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getFilename()
    {
        return $this->filename;
    }
<<<<<<< HEAD
=======

    /**
     * Gets the source code associated with this stream.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
