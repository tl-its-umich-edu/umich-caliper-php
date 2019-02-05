<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\actions\Action;
use IMSGlobal\Caliper\entities\agent\Organization;
use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\assessment\Assessment;
use IMSGlobal\Caliper\entities\assessment\AssessmentItem;
use IMSGlobal\Caliper\entities\lis\CourseSection;
use IMSGlobal\Caliper\entities\lis\Membership;
use IMSGlobal\Caliper\entities\lis\Role;
use IMSGlobal\Caliper\entities\lis\Status;
use IMSGlobal\Caliper\entities\session\Session;
use IMSGlobal\Caliper\events\AssessmentItemEvent;


/**
 * @requires PHP 5.6.28
 */
class EventAssessmentItemSkippedTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();


        $this->setTestObject(
            (new AssessmentItemEvent('urn:uuid:04e27704-73bf-4d3c-912c-1b2da40aef8f'))
                ->setActor(
                    (new Person('https://example.edu/users/554433'))
                )
                ->setAction(
                    new Action(Action::SKIPPED))
                ->setObject(
                    (new AssessmentItem('https://example.edu/terms/201601/courses/7/sections/1/assess/1/items/2'))
                        ->setName(
                            'Assessment Item 2'
                        )
                        ->setIsPartOf(
                            (new Assessment('https://example.edu/terms/201601/courses/7/sections/1/assess/1'))
                        )
                        ->setDateToStartOn(
                            new \DateTime('2016-11-14T05:00:00.000Z'))
                        ->setDateToSubmit(
                            new \DateTime('2016-11-18T11:59:59.000Z'))
                        ->setMaxAttempts(
                            2
                        )
                        ->setMaxSubmits(
                            2
                        )
                        ->setMaxScore(
                            1.0
                        )
                        ->setIsTimeDependent(
                            false
                        )
                        ->setVersion(
                            '1.0'
                        )
                )
                ->setEventTime(
                    new \DateTime('2016-11-15T10:14:30.000Z'))
                ->setEdApp(
                    (new SoftwareApplication('https://example.edu'))
                        ->setVersion(
                            'v2'
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
                    (new Session('https://example.edu/sessions/1f6442a482de72ea6ad134943812bff564a76259'))
                        ->setStartedAtTime(
                            new \DateTime('2016-11-15T10:00:00.000Z'))
                )
        );
    }
}
