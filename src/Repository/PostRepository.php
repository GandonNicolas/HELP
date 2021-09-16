<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findItems(string $query): array
    {

        $sql = "SELECT p.*,
            ts_rank(to_tsvector(content), to_tsquery('this & first')) as rank
            FROM post p
            WHERE ts_rank(to_tsvector(content), to_tsquery('this & first')) > 0
            ORDER BY ts_rank(to_tsvector(content), to_tsquery('this & first')) DESC 
            ";

        $rsm = new ResultSetMappingBuilder($this->getEntityManager());
        $rsm->addRootEntityFromClassMetadata(Post::class, 'p');
        $rsm->addScalarResult('rank', 'rank');

        
        // foreach ($this->getClassMetadata()->fieldMappings as $obj) {
        //     $rsm->addFieldResult("p", $obj["columnName"], $obj["title"]);
        // }

        $stmt = $this->getEntityManager()->createNativeQuery($sql, $rsm);

        // $stmt->setParameter(":title", new \title(""));
        // $stmt->setParameter(":content", MyClass::STATUS_AVAILABLE);
        // $stmt->setParameter(":keyword", MyClass::STATUS_UNKNOWN);

        $stmt->execute();

        return $stmt->getResult();
    }

    // /**
    //  * @return Post[] Returns an array of Post objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Post
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
