<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\actions\Action;
use IMSGlobal\Caliper\entities\agent\Organization;
use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\annotation\TagAnnotation;
use IMSGlobal\Caliper\entities\DigitalResource;
use IMSGlobal\Caliper\entities\lis\CourseSection;
use IMSGlobal\Caliper\entities\lis\Membership;
use IMSGlobal\Caliper\entities\lis\Role;
use IMSGlobal\Caliper\entities\lis\Status;
use IMSGlobal\Caliper\entities\Page;
use IMSGlobal\Caliper\entities\session\Session;
use IMSGlobal\Caliper\events\AnnotationEvent;


/**
 * @requires PHP 5.6.28
 */
class EventAnnotationTaggedTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();


        $this->setTestObject(
            (new AnnotationEvent('urn:uuid:b2009c63-2659-4cd2-b71e-6e03c498f02b'))
                ->setActor(
                    (new Person('https://example.edu/users/554433'))
                )
                ->setAction(
                    new Action(Action::TAGGED))
                ->setObject(
                    (new Page('https://example.com/#/texts/imscaliperimplguide/cfi/6/10!/4/2/2/2@0:0'))
                        ->setName(
                            'IMS Caliper Implementation Guide, pg 5'
                        )
                        ->setVersion(
                            '1.1'
                        )
                )
                ->setGenerated(
                    (new TagAnnotation('https://example.com/users/554433/texts/imscaliperimplguide/tags/3'))
                        ->setAnnotator(
                            (new Person('https://example.edu/users/554433'))->makeReference())
                        ->setAnnotated(
                            (new DigitalResource('https://example.com/#/texts/imscaliperimplguide/cfi/6/10!/4/2/2/2@0:0'))->makeReference())
                        ->setTags(
                            [
                                'profile'
                                ,
                                'event'
                                ,
                                'entity'
                                ,
                            ]
                        )
                        ->setDateCreated(
                            new \DateTime('2016-11-15T10:15:00.000Z'))
                )
                ->setEventTime(
                    new \DateTime('2016-11-15T10:15:00.000Z'))
                ->setEdApp(
                    (new SoftwareApplication('https://example.com/reader'))
                        ->setName(
                            'ePub Reader'
                        )
                        ->setVersion(
                            '1.2.3'
                        )
                )
                ->setGroup(
                    (new CourseSection('https://example.edu/terms/201601/courses/7/sections/1'))
                        ->setCourseNumber(
                            'CPS 435-01'
                        )
                        ->setAcademicSession(
                            'Fall 2016'
                        )
                )
                ->setMembership(
                    (new Membership('https://example.edu/terms/201601/courses/7/sections/1/rosters/1'))
                        ->setMember(
                            (new Person('https://example.edu/users/554433'))->makeReference())
                        ->setOrganization(
                            (new Organization('https://example.edu/terms/201601/courses/7/sections/1'))->makeReference())
                        ->setRoles(
                            [new Role(Role::LEARNER)])
                        ->setStatus(
                            new Status(Status::ACTIVE))
                        ->setDateCreated(
                            new \DateTime('2016-08-01T06:00:00.000Z'))
                )
                ->setSession(
                    (new Session('https://example.com/sessions/1f6442a482de72ea6ad134943812bff564a76259'))
                        ->setStartedAtTime(
                            new \DateTime('2016-11-15T10:00:00.000Z'))
                )
        );
    }
}
