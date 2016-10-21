<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Twig_Tests_Node_SandboxTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $body = new Twig_Node_Text('foo', 1);
        $node = new Twig_Node_Sandbox($body, 1);

        $this->assertEquals($body, $node->getNode('body'));
    }

    public function getTests()
    {
        $tests = array();

        $body = new Twig_Node_Text('foo', 1);
        $node = new Twig_Node_Sandbox($body, 1);

        $tests[] = array($node, <<<EOF
// line 1
<<<<<<< HEAD
\$sandbox = \$this->env->getExtension('sandbox');
=======
\$sandbox = \$this->env->getExtension('Twig_Extension_Sandbox');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
if (!\$alreadySandboxed = \$sandbox->isSandboxed()) {
    \$sandbox->enableSandbox();
}
echo "foo";
if (!\$alreadySandboxed) {
    \$sandbox->disableSandbox();
}
EOF
        );

        return $tests;
    }
}
